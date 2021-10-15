<?php

namespace App\Nova;

use Benjacho\BelongsToManyField\BelongsToManyField;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Status;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;

class Producto extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Producto::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'nombre';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'nombre',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            Heading::make('Meta'),
            BelongsTo::make('Categoría', 'categoria', 'App\Nova\Categoria'),
            BelongsTo::make('Subcategoría', 'subcategoria', 'App\Nova\Subcategoria'),
            Text::make('Nombre')->rules('required','string', 'max:255'),
            Heading::make('Datos del producto'),
            Slug::make('Slug')->from('nombre')->separator('-')->rules('required','string', 'max:255')->hideFromIndex(),
            Text::make('Imagen')->rules('required','string', 'max:255')->hideFromIndex(),
            Text::make('precio_antes')->rules('required','string', 'max:255')->hideFromIndex(),
            Text::make('precio_final')->rules('required','string', 'max:255')->hideFromIndex(),
            Text::make('Estrellas (del 1% al 100%)','estrellas')->rules('required','string', 'max:255')->hideFromIndex(),
            Text::make('sku')->rules('required','string', 'max:255')->hideFromIndex(),

            Heading::make('Datos de color'),
            Text::make('Color (negro)','color')->rules('required','string', 'max:255')->hideFromIndex(),
            Text::make('Código de color','codigo_color')->rules('required','string', 'max:255')->hideFromIndex(),
            Text::make('Código de color para filtrado','codigo_color_filtro')->rules('required','string', 'max:255'),

            Heading::make('Detalle'),
            Text::make('procedencia')->rules('required','string', 'max:255')->hideFromIndex(),
            Text::make('largo')->rules('required','string', 'max:255')->hideFromIndex(),
            Text::make('ancho')->rules('required','string', 'max:255')->hideFromIndex(),
            Text::make('alto')->rules('required','string', 'max:255')->hideFromIndex(),
            Text::make('peso')->rules('required','string', 'max:255')->hideFromIndex(),
            Text::make('material')->rules('required','string', 'max:255')->hideFromIndex(),
            Text::make('atributos')->rules('required','string', 'max:255')->hideFromIndex(),
            Text::make('limpieza')->rules('required','string', 'max:255')->hideFromIndex(),
            Text::make('recomendaciones')->rules('required','string', 'max:255')->hideFromIndex(),
           // Text::make('advertencias')->rules('required','string', 'max:255')->hideFromIndex(),
            Boolean::make('Nuevo')
                ->trueValue('si')
                ->falseValue('no'),
            Trix::make('Descripción', 'descripcion')->hideFromIndex(),
            BelongsToManyField::make('Medidas', 'medidas', 'App\Nova\Medida')->optionsLabel('titulo'),
            HasMany::make('imagesproductos'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
