<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SaudaraResource\Pages;
use App\Filament\Resources\SaudaraResource\RelationManagers;
use App\Models\Saudara;
use App\Models\OrangTua;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\ToggleButtons;

class SaudaraResource extends Resource
{
    protected static ?string $model = Saudara::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $orangTuaOptions = OrangTua::pluck('name', 'id')->toArray();

        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->required(),
                Forms\Components\Select::make('orang_tuas_id')
                ->label('Nama Orang Tua')
                ->options($orangTuaOptions)
                ->searchable()
                ->required(),
                
                Radio::make('gender')
                    ->options([
                        'Laki-laki' => 'Laki-laki',
                        'Perempuan' => 'Perempuan',
                    ]),

                ToggleButtons::make('status')
                ->options([
                    'Kakak' => 'Kakak',
                    'Adik' => 'Adik',
                ])
                ->inline(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('orang_tuas_id'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('gender'),
                Tables\Columns\TextColumn::make('status'),
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
            'index' => Pages\ListSaudaras::route('/'),
            'create' => Pages\CreateSaudara::route('/create'),
            'edit' => Pages\EditSaudara::route('/{record}/edit'),
        ];
    }
}
