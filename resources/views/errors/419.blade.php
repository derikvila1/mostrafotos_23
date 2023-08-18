@php
use Carbon\Carbon;
@endphp

@extends('errors::layout')

@section('title', '419')
@section('code', '419')
@section('message', 'Sessão expirada')
@section('submessage', '')
@section('details', 'Tente entrar novamente, caso não consiga, limpe o cache e os cookies do seu navegador')
@section('datetime', Carbon::now())
