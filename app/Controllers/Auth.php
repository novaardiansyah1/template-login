<?php namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
  protected $auth;
  
  public function __construct() 
  {
    $this->auth = new AuthModel();  
  }
  
	public function index()
	{
	  $data = [
	    'title' => 'Login',
	    'v'     => \Config\Services::validation(),
	  ];
	  
		return view('auth/login', $data);
	}
	
	public function register()
	{
	  $data = [
	    'title' => 'registrasi siswa/i',
	    'v'     => \Config\Services::validation(),
	  ];
	  
		return view('auth/register', $data);
	}
	
	public function proses_register()
	{
	  if(!$this->validate([
	    'nama' => [
	      'label' => 'Nama Lengkap',
	      'rules' => 'required|min_length[3]|max_length[60]'
	    ],
	    'username' => [
	      'label' => 'Username',
	      'rules' => 'required|min_length[6]|max_length[20]|is_unique[users.username]'
	    ],
	    'password' => [
	      'label' => 'Password',
	      'rules' => 'required|min_length[6]'
	    ],
	    'password1' => [
	      'label' => 'Konfirmasi Password',
	      'rules' => 'required|min_length[6]|matches[password]'
	    ],
	    'captcha' => [
	      'label' => 'Hasil Penjumlahan',
	      'rules' => 'required|min_length[3]|max_length[4]|numeric'
	    ]
	  ])) {
	    return redirect()->to('/auth/register')->withInput();
	  }
	  
	  if($this->request->getVar('captcha') !== $this->request->getVar('resultCaptcha'))
	  {
	    session()->set('capt_error','kolom Hasil Penjumlahan salah!');
	    return redirect()->to('/auth/register')->withInput();
	  }
	  
	  $this->auth->save([
	    'nama'     => $this->request->getVar('nama'),
	    'username' => $this->request->getVar('username'),
	    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
	    'level_id' => 1
	  ]);
	  
	  $this->_pesan('registrasi berhasil, silahkan login!');
	  return redirect()->to('/auth/login');
	}
	
	public function proses_login()
	{
	  if(!$this->validate([
	    'username' => [
	      'label' => 'Username',
	      'rules' => 'required|min_length[6]|max_length[20]'
	    ],
	    'password' => [
	      'label' => 'Password',
	      'rules' => 'required|min_length[6]'
	    ]
	  ])) {
	    return redirect()->to('/auth/login')->withInput();
	  }
	  
	  $username = $this->request->getVar('username');
	  $password = $this->request->getVar('password');
	  
	  $user = $this->auth->getAuth($username);
	  
	  if($user == null) {
	    $this->_pesan('username kamu belum terdaftar!', 'error');
	    return redirect()->to('/auth/login')->withInput();
	  }
	  
	  if(!password_verify($password, $user['password'])) {
	    $this->_pesan('password kamu salah!', 'error');
	    return redirect()->to('/auth/login')->withInput();
	  }
	  
	  $this->_pesan('selamat datang administrator');
	  return redirect()->to('/auth/login')->withInput();
	}
	
  private function _pesan($pesan, $type = null)
  {
    if($type == null)
    {
      session()->setFlashdata([
        'title' => 'berhasil diproses!',
        'pesan' => $pesan,
        'type'  => 'success'
      ]);
    } else {
      session()->setFlashdata([
        'title' => 'gagal diproses!',
        'pesan' => $pesan,
        'type'  => $type
      ]);
    }
  }
	//--------------------------------------------------------------------//
}