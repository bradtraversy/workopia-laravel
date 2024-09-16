<x-layout>
  <section class="flex flex-col md:flex-row gap-4">
    {{-- Profile Info Form --}}
    <div class="bg-white p-8 rounded-lg shadow-md w-full">
      <h3 class="text-3xl text-center font-bold mb-4">
        Profile Info
      </h3>

      <form method="POST" action="{{route('profile.update')}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <x-inputs.text id="name" name="name" label="Name" value="{{$user->name}}" />
        <x-inputs.text id="email" name="email" label="Email address" type="email" value="{{$user->email}}" />

        <button type="submit"
          class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 border rounded focus:outline-none">Save</button>
      </form>
    </div>

    {{-- Job Listings --}}
    <div class="bg-white p-8 rounded-lg shadow-md w-full">
      <h3 class="text-3xl text-center font-bold mb-4">
        My Job Listings
      </h3>
      @forelse($jobs as $job)
      <div class="flex justify-between items-center border-b-2 border-gray-200 py-2">
        <div>
          <h3 class="text-xl font-semibold">{{$job->title}}</h3>
          <p class="text-gray-700">{{$job->job_type}}</p>
        </div>
        <div class="flex space-x-3">
          <a href="{{route('jobs.edit', $job->id)}}" class="bg-blue-500 text-white px-4 py-2 rounded text-sm">Edit</a>
          <!-- Delete Form -->
          <form method="POST" action="{{route('jobs.destroy', $job->id)}}?from=dashboard"
            onsubmit="return confirm('Are you sure that you want to delete this job?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-500 hover:bg-red-600 text-white rounded text-sm">
              Delete
            </button>
          </form>
          <!-- End Delete Form -->
        </div>
      </div>
      @empty
      <p class="text-gray-700">You have not job listings</p>
      @endforelse
    </div>
  </section>
  <x-bottom-banner />
</x-layout>