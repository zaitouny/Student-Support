<?php

namespace App\Filament\Resources\SubjectResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Subject;

class PrerequisitesRelationManager extends RelationManager
{
    protected static string $relationship = 'prerequisites';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('year')
                    ->options([
                        'FirstYear' => 'First Year',
                        'SecondYear' => 'Second Year',
                        'ThirdYear' => 'Third Year',
                        'FourthYear' => 'Fourth Year',
                        'FifthYear' => 'Fifth Year',
                    ])
                    ->required(),
                Forms\Components\Select::make('term')
                    ->options([
                        'CH-I' => 'First Chapter',
                        'CH-II' => 'Second Chapter',
                    ])
                    ->required(),
                Forms\Components\Select::make('kind')
                    ->options([
                        'Scientific' => 'Scientific',
                        'Theoretical' => 'Theoretical',
                        'Linguistic' => 'Linguistic',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('hours')
                    ->required()
                    ->numeric(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('year')
                    ->searchable(),
                Tables\Columns\TextColumn::make('term')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kind')
                    ->searchable(),
                Tables\Columns\TextColumn::make('hours')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
                        $this->ownerRecord->prerequisites()->attach($data['subject_id']);
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
