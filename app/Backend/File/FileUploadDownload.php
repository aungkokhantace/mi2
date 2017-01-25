<?php

namespace App\Backend\File;

use Illuminate\Database\Eloquent\Model;

class FileUploadDownload extends Model
{
    protected $table = 'file';

    protected $fillable = [
        'id',
        'filename',
        'mime',
        'original_filename',
        'created_by','updated_by','deleted_by','created_at','updated_at','deleted_at'
    ];
}