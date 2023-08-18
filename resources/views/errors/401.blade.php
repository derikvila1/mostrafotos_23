@php
use Carbon\Carbon;
@endphp

@extends('errors::layout')

@section('title', '401')
@section('code', '401')
@section('message', 'Não autenticado')
@section('submessage', '')
@section('details', 'Não foi possível identificar você, Faça login para acessar esta página')
@section('datetime', Carbon::now())
