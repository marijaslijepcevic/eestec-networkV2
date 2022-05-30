<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if(!$session->has('admin') && !$session->has('user')){
            return redirect()->to(site_url('Gost'));
        }else if(!$session->has('admin') && $session->has('reguser')){
            return redirect()->to(site_url('RegUser'));
        }else if(!$session->has('admin') && $session->has('committee')){
            return redirect()->to(site_url('LocalCommittee'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}