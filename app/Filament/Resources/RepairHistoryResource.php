<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RepairHistoryResource\Pages;
use App\Filament\Resources\RepairHistoryResource\RelationManagers;
use App\Models\RepairHistory;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\DateTimePicker;
class RepairHistoryResource extends Resource
{
    protected static ?string $model = RepairHistory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('computer_id')
                    ->label('Computadora')
                    ->relationship('computer', 'brand')  // Asumiendo que tienes una relación "computer"
                    ->required(),

                // Campo para la descripción de la reparación
                Textarea::make('repair_description')
                    ->label('Descripción de Reparación')
                    ->required(),

                // Campo para seleccionar el estado de la reparación
                Select::make('repair_status')
                    ->options([
                        'pending' => 'Pendiente',
                        'completed' => 'Completada',
                        'in_progress' => 'En progreso',
                    ])
                    ->default('pending')
                    ->label('Estado de Reparación')
                    ->required(),

                // Campo para la fecha de reparación
                DateTimePicker::make('repair_date')
                    ->label('Fecha y Hora de Reparación')
                    ->required(),  // Marca como obligatorio
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('computer.brand')
                    ->label('Computadora')
                    ->sortable(),

                TextColumn::make('repair_description')
                    ->label('Descripción de Reparación')
                    ->limit(50)
                    ->sortable(),

                TextColumn::make('repair_status')
                    ->label('Estado')
                    ->sortable(),

                TextColumn::make('repair_date')
                    ->label('Fecha de Reparación')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListRepairHistories::route('/'),
            'create' => Pages\CreateRepairHistory::route('/create'),
            'edit' => Pages\EditRepairHistory::route('/{record}/edit'),
        ];
    }
}
