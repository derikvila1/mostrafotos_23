@php
use Carbon\Carbon;
@endphp

@extends('errors::layout')

@section('title', '503')
@section('code', '503')
@section('message', 'Serviço indisponível')
@section('submessage', 'O servidor não pode atender sua solicitação no momento, tente novamente mais tarde')
@section('details', 'Caso sua solicitação seja crítica, entre em contato com o suporte e informe o horário mostrado abaixo')
@section('datetime', Carbon::now())