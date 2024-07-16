<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReferenceResource\Pages;
use App\Filament\Resources\ReferenceResource\RelationManagers;
use App\Models\Reference;
use App\Models\Subject;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReferenceResource extends Resource
{
    protected static ?string $model = Reference::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('subject_id')
                    ->options(Subject::pluck('name', 'id')->toArray()) 
                    ->required(),
                Forms\Components\Select::make('status')
                    ->label('Section')
                    ->options([
                        0 => 'Practical section',
                        1 => 'Theoretical section',
                    ])
                    ->required(),
                Forms\Components\TextInput::make('link')
                    ->label('Link')
                    ->required()
                    ->maxLength(255)
                    ->rule('url')
                    ->placeholder('Enter a valid URL'),
                Forms\Components\Select::make('kind')
                    ->options([
                        'Video' => 'Video',
                        'Article' => 'Article',
                        'Podcast' => 'Podcast',
                        'Book' => 'Book',
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('subject.name')
                    ->label('Subject')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Section')
                    ->formatStateUsing(fn ($state) => $state == 1 ? 'Practical section' : 'Theoretical section')
                    ->sortable(),
                Tables\Columns\TextColumn::make('link')
                    ->label('Link')
                    ->url(fn ($record) => $record->link)
                    ->openUrlInNewTab()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('kind')
                    ->searchable(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReferences::route('/'),
            'create' => Pages\CreateReference::route('/create'),
            'view' => Pages\ViewReference::route('/{record}'),
            'edit' => Pages\EditReference::route('/{record}/edit'),
        ];
    }
}
