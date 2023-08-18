@php
use Carbon\Carbon;
@endphp

@extends('errors::layout')

@section('title', '403')
@section('code', '403')
@section('message', 'Não autorizado')
@section('submessage', '')
@section('details', 'Você não tem permissão para acessar esta área. Caso tenha permissão e não consiga acessar, entre em contato com o administrador do sistema')
@section('datetime', Carbon::now())
