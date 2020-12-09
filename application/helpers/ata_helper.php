<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    }
}
function is_admin()
{
    $ci = get_instance();
    $level = $ci->session->userdata('level');
    $akses = $ci->uri->segment(1);
    $ci->db->get_where('mst_user', ['level' => $akses]);
    if ($level !== 'Admin') {
        redirect('auth/blocked');
    }
}

function is_koordinator()
{
    $ci = get_instance();
    $level = $ci->session->userdata('level');
    $akses = $ci->uri->segment(1);
    $ci->db->get_where('mst_user', ['level' => $akses]);
    if ($level !== 'Koordinator') {
        redirect('auth/blocked');
    }
}

function is_user()
{
    $ci = get_instance();
    $level = $ci->session->userdata('level');
    $akses = $ci->uri->segment(1);
    $ci->db->get_where('mst_user', ['level' => $akses]);
    if ($level !== 'User') {
        redirect('auth/blocked');
    }
}
