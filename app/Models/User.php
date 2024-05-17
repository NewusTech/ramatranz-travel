<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use SoftDeletes;
    use HasRoles;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

  

    public function tasks(){
        return $this->hasMany(TodoList::class);
    }

    public function getActiveTaskAttribute(){
       return  TodoList::where(['user_id'=> $this->id, 'is_done' => 0])->get();
    }    

    public function usaha(){
        return $this->hasMany(InfoUsaha::class,'user_id');
    }

    public function getAlamatLengkapAttribute(){
        $alamat = $this->alamat;
        if($this->desa_id){
             $desa = \Indonesia::findVillage((int)$this->desa_id,['province', 'city', 'district', 'district.city', 'district.city.province']);
            $alamat .= " Kel/Desa ". ucwords(strtolower($desa->name));
            $alamat .= " Kecamatan ". ucwords(strtolower($desa->district->name));
            $alamat .= " ".ucwords(strtolower($desa->city->name));
            $alamat .= " Provinsi ". ucwords(strtolower($desa->province->name));
        }
        if($this->kodepos){
            $alamat .= ", ".$this->kodepos;
        }
        return $alamat;
    }

    public function getPengajuanAktifAttribute(){
        return Pengajuan::whereNotIn('status',[2,3,4])->get();
    }
  

}
