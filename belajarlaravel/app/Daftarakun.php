<?php 
namespace App; 
use Illuminate\Database\Eloquent\Model; 
class Daftarakun extends Model 
{ 
    protected $table = 'users';
 protected $fillable = [ 
 "nama",
 "email",
 "passwrod", 
 "role" 
 ]; 
} 
?>