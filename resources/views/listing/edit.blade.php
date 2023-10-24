<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="{{asset('styles/style.css')}}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    </head>
    <body class="mb-3">
        <section  class="mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <h5 class="mb-4 text-primary">Update a Listing</h5>
                        <form id="listing" name="listing" action="{{route('update')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <input type="hidden" name="id" value="{{$listing->id}}"/>
                                <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{$listing->name}}"/>
                                <span class="text-danger mt-1" id="nameMsg">
                                    @error('name')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-3">
                                <input type="number" name="age" id="age" placeholder="Age" class="form-control" min="0" max="100" value="{{$listing->age}}"/>
                                <span class="text-danger mt-1" id="ageMsg">
                                    @error('age')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-3">
                                <input type="email" name="email" id="email" placeholder="Email" class="form-control" value="{{$listing->email}}"/>
                                <span class="text-danger mt-1" id="emailMsg">
                                    @error('email')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-3">
                                <input type="date" name="dob" id="dob" value="{{$listing->dob}}" class="form-control"/>
                                <span class="text-danger mt-1" id="dobMsg">
                                    @error('dob')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-3">
                                <input type="number" name="contact" id="contact" placeholder="Phone number" class="form-control" value="{{$listing->contact}}"/>
                                <span class="text-danger mt-1" id="contactMsg">
                                    @error('contact')
                                    {{$message}}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-3">
                                <input type="file" name="image" id="image" class="form-control" accept=".png, .jopg, .jpeg" />
                                 <span class="text-danger mt-1" id="imageMsg">
                                    @error('image')
                                    {{$message}}
                                    @enderror
                                 </span>
                            </div>
                            <div class="mb-3 text-right">
                                <button type="submit" class="px-3 py-1 bg-primary rounded text-white">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section> 

        <script src="{{asset('js/validation.js')}}"></script>
    </body>
    </html>
    </x-app-layout>