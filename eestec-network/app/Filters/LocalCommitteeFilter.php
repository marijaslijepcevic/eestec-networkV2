<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class LocalCommitteeFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if(!$session->has('committee') && !$session->has('user')){
            return redirect()->to(site_url('Gost'));
        }else if(!$session->has('committee') && $session->has('reguser')){
            return redirect()->to(site_url('RegUser'));
        }else if(!$session->has('committee') && $session->has('admin')){
            return redirect()->to(site_url('Admin'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}