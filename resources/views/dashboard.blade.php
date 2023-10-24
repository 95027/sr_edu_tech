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
</head>
<body>
    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('create')}}">
                        <button class="border-2 px-3 py-1 border-secondary rounded">Create Listing</button>
                    </a>
                </div>
            </div>
            <div class="row mt-3 mb-3">
                <div class="col-md-12">
                    @if(session()->get('message'))
                    <span x-data="{show:true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="text-success">{{session()->get('message')}}</span>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if( count($listings) > 0)
                    <table>
                        <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Email</th>
                                <th>DOB</th>
                                <th>Contact</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listings as $listing)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$listing->name}}</td>
                                    <td>{{$listing->age}}</td>
                                    <td>{{$listing->email}}</td>
                                    <td>{{date('d/m/y', strtotime($listing->dob))}}</td>
                                    <td>{{$listing->contact}}</td>
                                    <td>
                                        <img src="{{asset('profile_images/' . $listing->image)}}" alt="profile" class="mx-auto" />
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('edit', $listing->id)}}">
                                            <button class="px-3 py-1 bg-primary text-white rounded">Edit</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <div class="text-center mt-3">
                        <span class="text-danger">No records founds....</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>
</x-app-layout>
