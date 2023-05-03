@extends('app')
@section('title', 'Lamaran')
@section('content')
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card-box mt-5">
                <div class="text-center">
                    <img src="{{ asset('assets/img/energeek2.png') }}" width="300" alt="">
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title text-center">Apply Lamaran</h4>
                    </div>

                    <form action="http://127.0.0.1:8000/api/candidate/store" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Masukan nama lengkap"
                                    value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="text-muted">{{ $error }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <select class="form-control select2" style="width: 100%;" name="job_id" required>
                                    <option selected="selected"> -- Pilih Jabatan -- </option>
                                    @foreach ($jobs as $job)
                                        <option value="{{ $job->id }}">{{ $job->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="phone">Telepon</label>
                                <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                    id="phone" name="phone" placeholder="Masukan nomor telepon"
                                    value="{{ old('phone') }}" required>
                                @error('phone')
                                    <div class="text-muted">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" placeholder="Masukan email" value="{{ old('email') }}"
                                    required>
                                @error('email')
                                    <div class="text-muted">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="year">Tahun Lahir</label>
                                <input type="number" class="form-control @error('year') is-invalid @enderror"
                                    id="year" name="year" placeholder="Masukan tahun lahir"
                                    value="{{ old('year') }}" required>
                                @error('year')
                                    <div class="text-muted">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Skill</label>
                                <select class="form-control select2" style="width: 100%;" name="skill[]" multiple="multiple"
                                    required>
                                    @foreach ($skills as $skill)
                                        <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-danger btn-block">Apply</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
