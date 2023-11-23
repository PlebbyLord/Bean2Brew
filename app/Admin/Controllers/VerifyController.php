<?php

namespace App\Admin\Controllers;

use App\Models\Verify;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Notifications\ApprovedOrReject;
use Encore\Admin\Form\Field\BelongsTo;
use Illuminate\Http\RedirectResponse;

class VerifyController extends AdminController
{
    public $verification_status;
    public $images;
    
    protected $title = 'Verify';

    protected $fillable = ['verify_id', 'path'];

    protected function grid(): grid
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

    protected function detail($id): show
    {
        $show = new Show(Verify::findOrFail($id));

        return $show;
    }

    protected function form(): form
    {
        $form = new Form(new Verify());

        

        return $form;
    }

   
    public function accept($id): RedirectResponse
    {
        $user = auth()->user();
        $verify = Verify::findOrFail($id);
        $verify->update(['verification_status' => true]);
        if ($verify->user) {
            $verify->user->notify(new ApprovedOrReject('approved'));
        }
        return back();
    }

    
    public function reject($id): RedirectResponse
    {
        $user = auth()->user();
        $verify = Verify::findOrFail($id);
        if ($verify->user) {
            $verify->user->notify(new ApprovedOrReject('rejected'));
        }
        $verify->images()->delete();
        $verify->delete();
        
        return back();
    }
    
    
    public function verify(): BelongsTo
    {
        return $this->belongsTo(Verify::class, 'verify_id')->withDefault();
    }
}
