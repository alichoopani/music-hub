<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AlbumRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class AlbumCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AlbumCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Album::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/album');
        CRUD::setEntityNameStrings('album', 'albums');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('id');
        CRUD::column('title');
        CRUD::column('artist_id');
        CRUD::column('publish');
        CRUD::column('approve')
            ->label(__('Approve'))
            ->type('boolean')
            ->options([
                0 => ' ', 1 => ' '
            ])
            ->wrapper([
                'element' => 'i', // the element will default to "a" so you can skip it here
                'class' => function ($crud, $column, $entry, $related_key) {
                    if ($entry->approve == 1)
                        return 'las la-check-circle font-weight-bolder lead';
                    elseif ($entry->approve == 0)
                        return 'las la-times-circle font-weight-bolder lead';
                },
                // 'target' => '_blank',
            ]);

        CRUD::column('image')
            ->type('image')
            ->prefix('/storage/');
        CRUD::column('category_id');
        CRUD::column('created_at');
        CRUD::column('updated_at');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(AlbumRequest::class);

//        CRUD::field('id');
        CRUD::field('title');
        CRUD::field('artist_id');
        CRUD::field('publish')
            ->type('date');

        CRUD::field('image')
            ->type('image')
            ->crop(true)
            ->aspect_ratio(1)
            ->disk('public');

        CRUD::field('category_id');

        CRUD::field('approve');
//        CRUD::field('created_at');
//        CRUD::field('updated_at');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }
}
