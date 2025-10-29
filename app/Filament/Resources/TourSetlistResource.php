<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TourSetlistResource\Pages;
use App\Models\TourSetlist;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TourSetlistResource extends Resource
{
    protected static ?string $model = TourSetlist::class;

    protected static ?string $navigationIcon = 'heroicon-o-queue-list';

    protected static ?string $navigationLabel = 'Mr.Children セットリスト';

    protected static ?string $modelLabel = 'Mr.Children セットリスト';

    protected static ?string $navigationGroup = 'Database';

    protected static ?int $navigationSort = 21;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('基本情報')
                    ->schema([
                        Forms\Components\Select::make('tour_id')
                            ->label('ツアー')
                            ->relationship('tour', 'title')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Forms\Components\TextInput::make('order_no')
                            ->label('パターン番号')
                            ->numeric()
                            ->required(),

                        Forms\Components\TextInput::make('subtitle')
                            ->label('サブタイトル（日付や説明）')
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('セットリスト')
                    ->schema([
                        Forms\Components\Repeater::make('setlist')
                            ->label('本編')
                            ->schema([
                                Forms\Components\Hidden::make('_uuid')
                                    ->default(fn() => \Illuminate\Support\Str::uuid()->toString()),
                                Forms\Components\Select::make('song')
                                    ->label('曲名')
                                    ->options(fn() => \App\Models\Song::pluck('title', 'id')) // 既存曲の候補だけ
                                    ->searchable()
                                    ->required()
                                    ->live()
                                    ->columnSpan(2)
                                    ->mutateDehydratedStateUsing(function ($state) {
                                        // 数値なら既存曲IDとして保存
                                        if (is_numeric($state)) {
                                            return $state;
                                        }

                                        // 文字列ならそのまま保存（songs テーブルには登録しない）
                                        if (is_string($state) && $state !== '') {
                                            return $state;
                                        }

                                        return null;
                                    }),
                                Forms\Components\Toggle::make('is_daily')
                                    ->label('日替わり')
                                    ->default(false)
                                    ->inline(false)
                                    ->live()
                                    ->columnSpan(1),
                            ])
                            ->columns(3)
                            ->defaultItems(0)
                            ->live()
                            ->reorderable()
                            ->itemLabel(function (array $state, $component): ?string {
                                $items = $component->getState();
                                if (!is_array($items)) return '1';

                                // UUIDで現在のアイテムを特定
                                $currentUuid = $state['_uuid'] ?? null;
                                if (!$currentUuid) return '?';

                                $number = 0;
                                foreach ($items as $item) {
                                    $isDaily = !empty($item['is_daily']);
                                    $uuid = $item['_uuid'] ?? null;

                                    if ($uuid === $currentUuid) {
                                        if ($isDaily) {
                                            return '';
                                        } else {
                                            $number++;
                                            return (string)$number;
                                        }
                                    }

                                    if (!$isDaily) {
                                        $number++;
                                    }
                                }

                                return '1';
                            })
                            ->addActionLabel('曲を追加')
                            ->columnSpanFull(),

                        Forms\Components\Repeater::make('encore')
                            ->label('アンコール')
                            ->schema([
                                Forms\Components\Hidden::make('_uuid')
                                    ->default(fn() => \Illuminate\Support\Str::uuid()->toString()),
                                Forms\Components\Select::make('song')
                                    ->label('曲名')
                                    ->options(function () {
                                        return \App\Models\Song::pluck('title', 'id');
                                    })
                                    ->searchable()
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('title')
                                            ->label('曲名')
                                            ->required(),
                                    ])
                                    ->createOptionUsing(function (array $data) {
                                        $song = \App\Models\Song::create(['title' => $data['title']]);
                                        return $song->id;
                                    })
                                    ->required()
                                    ->live()
                                    ->columnSpan(2),
                                Forms\Components\Toggle::make('is_daily')
                                    ->label('日替わり')
                                    ->default(false)
                                    ->inline(false)
                                    ->live()
                                    ->columnSpan(1),
                            ])
                            ->columns(3)
                            ->defaultItems(0)
                            ->live()
                            ->reorderable()
                            ->itemLabel(function (array $state, $component, Forms\Get $get): ?string {
                                // 本編のsetlistから曲数を取得
                                $setlistItems = $get('setlist') ?? [];
                                $setlistCount = 0;
                                foreach ($setlistItems as $item) {
                                    if (empty($item['is_daily'])) {
                                        $setlistCount++;
                                    }
                                }

                                $items = $component->getState();
                                if (!is_array($items)) return (string)($setlistCount + 1);

                                // UUIDで現在のアイテムを特定
                                $currentUuid = $state['_uuid'] ?? null;
                                if (!$currentUuid) return '?';

                                $number = $setlistCount;
                                foreach ($items as $item) {
                                    $isDaily = !empty($item['is_daily']);
                                    $uuid = $item['_uuid'] ?? null;

                                    if ($uuid === $currentUuid) {
                                        if ($isDaily) {
                                            return '';
                                        } else {
                                            $number++;
                                            return (string)$number;
                                        }
                                    }

                                    if (!$isDaily) {
                                        $number++;
                                    }
                                }

                                return (string)($setlistCount + 1);
                            })
                            ->addActionLabel('曲を追加')
                            ->columnSpanFull(),
                    ])
                    ->collapsible(),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('tour.title')
                    ->label('ツアー')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('order_no')
                    ->label('パターン')
                    ->sortable(),
                Tables\Columns\TextColumn::make('subtitle')
                    ->label('サブタイトル')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('作成日')
                    ->dateTime('Y-m-d H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('tour')
                    ->relationship('tour', 'title')
                    ->label('ツアー')
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('id', 'asc'); // ID昇順に変更
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
            'index' => Pages\ListTourSetlists::route('/'),
            'create' => Pages\CreateTourSetlist::route('/create'),
            'edit' => Pages\EditTourSetlist::route('/{record}/edit'),
        ];
    }
}
