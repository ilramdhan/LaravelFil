<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnakResource\Pages;
use App\Filament\Resources\AnakResource\RelationManagers;
use App\Models\Anak;
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


class AnakResource extends Resource
{
    protected static ?string $model = Anak::class;

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
                ToggleButtons::make('education_sd')
                    ->options([
                        'Yes' => 'Yes',
                        'No' => 'No',
                    ])
                    ->inline(),
                ToggleButtons::make('education_smp')
                    ->options([
                        'Yes' => 'Yes',
                        'No' => 'No',
                    ])
                    ->inline(),
                ToggleButtons::make('education_sma')
                    ->options([
                        'Yes' => 'Yes',
                        'No' => 'No',
                    ])
                    ->inline(),
                ToggleButtons::make('education_s1')
                    ->options([
                        'Yes' => 'Yes',
                        'No' => 'No',
                    ])
                    ->inline(),
                ToggleButtons::make('education_s2')
                    ->options([
                        'Yes' => 'Yes',
                        'No' => 'No',
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
                Tables\Columns\TextColumn::make('education_sd'),
                Tables\Columns\TextColumn::make('education_smp'),
                Tables\Columns\TextColumn::make('education_sma'),
                Tables\Columns\TextColumn::make('education_s1'),
                Tables\Columns\TextColumn::make('education_s2'),
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
            'index' => Pages\ListAnaks::route('/'),
            'create' => Pages\CreateAnak::route('/create'),
            'edit' => Pages\EditAnak::route('/{record}/edit'),
        ];
    }
}
