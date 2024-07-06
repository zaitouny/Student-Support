<?php

namespace App\Filament\Resources\StudentResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Subject;

class SubjectsForThisSemesterRelationManager extends RelationManager
{
    protected static string $relationship = 'SubjectsForThisSemester';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('subject_id')
                    ->label('Subject')
                    ->options(Subject::all()->pluck('name', 'id')->toArray())
                    ->required(),
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        1 => 'Successful',
                        0 => 'Failed',
                        2 => 'Pending',
                    ])
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('year'),
                Tables\Columns\TextColumn::make('term'),
                Tables\Columns\TextColumn::make('hours'),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->getStateUsing(function ($record) {
                        $status = $record->pivot->status ?? null;
                        return match ($status) {
                            1 => 'Successful',
                            0 => 'Failed',
                            2 => 'Pending',
                            default => 'Unknown',
                        };
                    })
                    ->badge()
                    ->colors([
                        'primary' => 'Pending',
                        'success' => 'Successful',
                        'danger' => 'Failed',
                        'secondary' => 'Unknown',
                    ]),
                Tables\Columns\TextColumn::make('mark'),
                Tables\Columns\TextColumn::make('how_often'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //Tables\Actions\CreateAction::make(),
                Tables\Actions\AttachAction::make()
                    ->form(fn (array $data) => [
                        Forms\Components\Select::make('subject_id')
                            ->label('Select Subject')
                            ->options(Subject::all()->pluck('name', 'id')->toArray())
                            ->searchable()
                            ->getSearchResultsUsing(fn (string $query) => Subject::where('name', 'like', "%{$query}%")->pluck('name', 'id'))
                            ->required(),
                    ])
                    ->action(function (array $data) {
                        $this->ownerRecord->SubjectsForThisSemester()->attach($data['subject_id']);
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
