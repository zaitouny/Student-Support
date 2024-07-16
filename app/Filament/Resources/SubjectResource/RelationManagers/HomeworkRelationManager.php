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

class HomeworkRelationManager extends RelationManager
{
    protected static string $relationship = 'homework';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('subject_id')
                    ->label('Subject')
                    ->options(Subject::all()->pluck('name', 'id')->toArray())
                    ->required(),
                Forms\Components\Select::make('status')
                    ->label('Section')
                    ->options([
                        0 => 'Practical section',
                        1 => 'Theoretical section',
                    ])
                    ->required(),
                Forms\Components\DatePicker::make('last_date'),
                Forms\Components\TextInput::make('supporting_link')
                        ->label('Supporting Link')
                        ->required()
                        ->maxLength(255)
                        ->rule('url')
                        ->placeholder('Enter a valid URL'),
                Forms\Components\Textarea::make('description')
                        ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('subject_id')
            ->columns([
                Tables\Columns\TextColumn::make('subject.name')
                ->label('Subject')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Section')
                    ->formatStateUsing(fn ($state) => $state == 1 ? 'Practical section' : 'Theoretical section')
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('supporting_link')
                    ->label('Supporting Link')
                    ->url(fn ($record) => $record->supporting_link)
                    ->openUrlInNewTab()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
