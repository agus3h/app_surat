<?php

function cek_sudah_login(){
	$ci =& get_instance();
	$user_session= $ci->session->userdata('userid');
	if ($user_session) {
		redirect('dashboard');
	}
}


function cek_belum_login(){
	$ci =& get_instance();
	$user_session= $ci->session->userdata('userid');
	if (!$user_session) {
		redirect('auth');
	}
}

function cek_admin(){
	$ci=& get_instance();
	$ci->load->library('fungsi');
	if ($ci->fungsi->user_login()->level !=3) {
		redirect('dashboard');
	}
}

function cek_pengolah(){
	$ci=& get_instance();
	$ci->load->library('fungsi');
	if ($ci->fungsi->user_login()->level !=2) {
		redirect('dashboard');
	}
}

function cek_pencatat(){
	$ci=& get_instance();
	$ci->load->library('fungsi');
	if ($ci->fungsi->user_login()->level ==1) {
		redirect('dashboard');
	}
}





?>