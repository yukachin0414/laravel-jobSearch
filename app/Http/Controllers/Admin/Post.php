<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
   protected $fillable = ['title', 'content', 'user_id'];
}