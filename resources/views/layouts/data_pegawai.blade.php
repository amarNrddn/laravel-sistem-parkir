@extends('master_layout.master')

@section('title','Data Pegawai')


@section('content')
<div class="row">
	<div class="col-md-10 offset-md-1">
		@if (session('message'))
			<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top:2%">
				<h3>Success <span class="fa fa-check"></span></h3>
				<hr style="margin-top:-0.6%">
				{{ session('message') }}
				<button type="button" class="close" data-dismiss="alert">
					<span>&times;</span>
				</button>
			</div>
		@endif
		<button type="button" id="register" class="btn btn-primary" data-target="#modal_create" data-toggle="modal" style="margin-top:10%;margin-bottom:1%">Tambah Pegawai <span class="fa fa-plus"></span></button>
		<table class="table table-bordered table-striped">
			<thead>
				<th class="text-center">No</th>
				<th class="text-center">Nama</th>
				<th class="text-center">No Telp</th>
				<th class="text-center">Email</th>
				<th class="text-center">Level</th>
				<th class="text-center">Action</th>
			</thead>
			<tbody>
				@foreach ($data as $datas)
				<tr>
					<td class="text-center">{{ $no++ }}</td>
					<td class="text-center">{{ $datas->nama_user }}</td>
					<td class="text-center">{{ $datas->no_telp }}</td>
					<td class="text-center">{{ $datas->email }}</td>
					<td class="text-center">{{ $datas->level }}</td>
					<td class="text-center">
						<div class="btn-group">
						<a href="/pegawai/HapusPegawai/{{ $datas->id }}" class="btn btn-danger" onclick="return confirm('Yakin Ingin Menhapus Data Ini ?')"><span class="fa fa-trash"></span></a>
						<a href="/pegawai/EditPegawai/{{ $datas->id }}" class="btn btn-success"><span class="fa fa-pencil"></span></a>
						</div>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>


<form action="/pegawai/InputPegawai" method="post">
<div class="modal fade" id="modal_create" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Register</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       	<div class="row">
       		<div class="col-md-12">
       			<div class="row">
       				<div class="col-md-12">
       					<div class="form-group">
       						<label for="">Nama</label>
       						<input type="text" name="name" value="{{ old('name') }}" placeholder="" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" autocomplete="off" required="">
       						@if ($errors->has('name'))
       							<span class="help-block">
       								<p style="color: red">{{ $errors->first('name') }}</p>
       							</span>
       						@endif
       					</div>
       				</div>

       				<div class="col-md-12">
       					<div class="form-group">
       						<label for="">No Telp</label>
       						<input type="number" name="no_telp" value="{{ old('no_telp') }}" placeholder="" class="form-control{{ $errors->has('no_telp') ? ' is-invalid' : '' }}" required="" maxlength="12">
							@if ($errors->has('no_telp'))
								<span class="help-block">
									<p style="color:red">{{ $errors->first('no_telp') }}</p>
								</span>
							@endif
       					</div>
       				</div>

       				<div class="col-md-12">
       					<div class="form-group">
       						<label for="">Email</label>
       						<input type="email" name="email" value="{{ old('email') }}" placeholder="" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" autocomplete="off" required="">
							@if ($errors->has('email'))
								<span class="help-block">
									<p style="color:red">{{ $errors->first('email') }}</p>
								</span>
							@endif
       					</div>
       				</div>

       				<div class="col-md-12" style="display: none">
       					<div class="form-group">
       						<label for="">level</label>
       						<input type="text" name="level" value="User" placeholder="" class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}" readonly="">
							@if ($errors->has('User'))
								<span class="help-block">
									<p style="color:red">{{ $errors->first('User') }}</p>
								</span>
							@endif
       					</div>
       				</div>
					
					<div class="col-md-12">
       					<div class="form-group">
       						<label for="">Password</label>
       						<input type="password" name="password" value="" placeholder="" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required="">
							@if ($errors->has('password'))
								<span class="help-block">
									<p style="color:red">{{ $errors->first('password') }}</p>
								</span>
							@endif
       					</div>
       				</div>

       				<div class="col-md-12">
       					<div class="form-group">
       						<label for="">Password-Confirm</label>
       						<input type="password" name="password_confirmation" value="" placeholder="" class="form-control" id="" required="">
       					</div>
       				</div>
       			</div>
       		</div>
       	</div>
      </div>
      <div class="modal-footer">
      	{{ csrf_field() }}
        <button type="submit" class="btn btn-primary">Register</button>
      </div>
    </div>
  </div>
</div>
</form>


@endsection