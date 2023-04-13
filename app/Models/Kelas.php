namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = ['nama_kelas', 'nama_wali_kelas', 'daftar_siswa'];
}