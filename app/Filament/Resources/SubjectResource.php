<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubjectResource\Pages;
use App\Filament\Resources\SubjectResource\RelationManagers;
use App\Filament\Resources\SubjectResource\RelationManagers\DependentsRelationManager;
use App\Filament\Resources\SubjectResource\RelationManagers\HomeworkRelationManager;
use App\Filament\Resources\SubjectResource\RelationManagers\PrerequisitesRelationManager;
use App\Filament\Resources\SubjectResource\RelationManagers\QuizzesRelationManager;
use App\Filament\Resources\SubjectResource\RelationManagers\ReferencesRelationManager;
use App\Models\Subject;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SubjectResource extends Resource
{
    protected static ?string $model = Subject::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
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
                Forms\Components\Textarea::make('description')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
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
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            ReferencesRelationManager::class,
            PrerequisitesRelationManager::class,
            DependentsRelationManager::class,
            QuizzesRelationManager::class,
            HomeworkRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubjects::route('/'),
            'create' => Pages\CreateSubject::route('/create'),
            'view' => Pages\ViewSubject::route('/{record}'),
            'edit' => Pages\EditSubject::route('/{record}/edit'),
        ];
    }
}
