<?php

namespace App\Admin\Controllers;

use App\Models\Song;
use App\Models\Album;
use App\Models\Single;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SongController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Songs';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Song());

        $grid->column('id', __('ID'));
        $grid->column('title', __('タイトル'));
        $grid->column('album_id', __('アルバム'))->display(function($id) {
            $album = optional(Album::find($id));
            if ($album) {
                return $album->title;
            }
        });
        $grid->column('single_id', __('シングル'))->display(function($id) {
            $single = optional(Single::find($id));
            if ($single) {
                return $single->title;
            }
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Song::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('title', __('タイトル'));
        $show->field('album_id', __('アルバム'))->as(function($id) {
            $album = optional(Album::find($id));
            if ($album) {
                return $album->title;
            }
        });
        $show->field('single_id', __('シングル'))->as(function($id) {
            $single = optional(Single::find($id));
            if ($single) {
                return $single->title;
            }
        });
        $show->field('year', __('年'));
        $show->field('text', __('コメント'));
        $show->field('created_at', __('作成日時'));
        $show->field('updated_at', __('更新日時'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Song());

        $form->text('id', __('ID'))->rules('required');
        $form->text('title', __('タイトル'))->rules('required');
        $form->select('album_id', __('アルバム'))->options(Album::all()->pluck('title', 'id'));
        $form->select('single_id', __('シングル'))->options(Single::all()->pluck('title', 'id'));
        $form->text('year', __('年'));
        $form->textarea('text', __('コメント'));

        return $form;
    }
}
