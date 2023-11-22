<?php

namespace App\Admin\Controllers;

use App\Models\Verify;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Notifications\ApprovedOrReject;
use Illuminate\Support\Facades\Storage;


class VerifyController extends AdminController
{
    public $verification_status;
    public $images;
    /**
     * Title for the current resource.
     *
     * @var string
     */
    protected $title = 'Verify';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected $fillable = ['verify_id', 'path'];

    protected function grid()
{
    $grid = new Grid(new Verify());

    $grid->header(function ($query) {
        echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">';
        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>';
    });

    $grid->column('id', 'ID');
    $grid->column('user.name', 'User Name');
    $grid->column('company_name', 'Company Name');
    $grid->column('verification_status', 'Verification Status')->display(function ($status) {
        return $status ? 'Approved' : 'Pending';
    });

    $grid->column('images', 'Verification Images')->display(function () {
        $html = '';
    
        foreach ($this->images as $image) {
            $imagePath = url("storage/{$image->path}");
            $html .= "<a href='{$imagePath}' data-lightbox='verification-images' data-title='Verification Image'>";
            $html .= "<img src='{$imagePath}' style='margin-right: 5px; width: 50px; height: 50px;'>";
            $html .= "</a>";
        }
    
        return $html;
    });

    $grid->column('actions', 'Verify')->display(function () {
        $verificationStatus = $this->verification_status ?? null;
        
        if ($verificationStatus) {
            return '<span class="label label-success">User Approved</span>';
        }
    
        $approveButton = '<a href="' . route('admin.verify.accept', $this->getKey()) . '" class="btn btn-sm btn-success">Approve</a>&nbsp;&nbsp;';
        $rejectButton = '<a href="' . route('admin.verify.reject', $this->getKey()) . '" class="btn btn-sm btn-danger">Reject</a>';
        
        return $approveButton . $rejectButton;
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
        $show = new Show(Verify::findOrFail($id));


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Verify());

        // Customize the form if needed

        return $form;
    }

    public function accept($id)
    {
        $user = auth()->user();
        $verify = Verify::findOrFail($id);
        $verify->update(['verification_status' => true]);
        if ($verify->user) {
            $verify->user->notify(new ApprovedOrReject('approved'));
        }
        return back();
    }

    public function reject($id)
    {
        $user = auth()->user();
        $verify = Verify::findOrFail($id);
        if ($verify->user) {
            $verify->user->notify(new ApprovedOrReject('rejectted'));
        }
        $verify->images()->delete();
        $verify->delete();
        
        return back();
    }
    
    public function verify()
    {
        return $this->belongsTo(Verify::class, 'verify_id')->withDefault();
    }

    
}
