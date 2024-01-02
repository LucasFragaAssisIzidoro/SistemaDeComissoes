<?php

class Estoques extends Controller{
    public function index(){
        $this->view('estoques/index');
    }
    public function entrada(){
        $this->view('estoques/entrada');
    }
    public function saida(){
        $this->view('estoques/saida');
    }
    public function ver(){
        $this->view('estoques/ver');
    }
}