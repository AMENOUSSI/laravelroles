

<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Articles Page') }}
            </h2>
            <a href="{{ route('articles.create') }}" class="bg-slate-700 text-md rounded-md text-white px-5 py-3">&plus;</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

           <x-message></x-message>
            <table class="w-full">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th  class="px-6 py-3 text-left" width="60">
                        #
                    </th>
                    <th class="px-6 py-3 text-left">
                        Title
                    </th>
                    <th class="px-6 py-3 text-left">
                        Content
                    </th>
                    <th class="px-6 py-3 text-left">
                        Author
                    </th>
                    <th  class="px-6 py-3 text-left" width="180">
                        Created At
                    </th>
                    <th  class="px-6 py-3 text-center" width="180">
                        Actions
                    </th>


                </tr>
                </thead>
                <tbody class="bg-white">
                @if($articles->isNotEmpty())
                    @foreach($articles as $article)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-left">
                                {{ $article->id }}
                            </th>
                            <td class="px-6 py-3 text-left">
                                {{ $article->title }}
                            </td>
                            <td class="px-6 py-3 text-left">
                                {{ $article->text}}
                            </td>
                            <td class="px-6 py-3 text-left">
                                {{ $article->author }}
                            </td>
                            <td class="px-6 py-3 text-left">
                                {{\Carbon\Carbon::parse($article->created_at)->format('d M, Y')  }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <a href="{{ route('articles.edit',$article->id) }}" class="bg-green-700 text-md rounded-md text-white px-3 py-2">Edit</a>
                                <a href="javascript:void(0);" onclick="deletePermission({{ $article->id }})" class="bg-red-700 text-md rounded-md text-white px-3 py-2">Delete</a>


                            </td>


                        </tr>
                    @endforeach
                @endif



                </tbody>
            </table>
            <div class="my-3">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
    <x-slot name="script">
        <script type="text/javascript">
            function deletePermission(id){
                if(confirm("Are you sure want to delete?")){
                    $.ajax({
                        url: '{{ route('articles.destroy') }}',
                        type: 'delete',
                        data: {id:id},
                        dataType: 'json',
                        headers:{
                            'x-csrf-token' : '{{ csrf_token() }}'
                        },
                        success: function (response){
                            window.location.href = '{{ route("articles.index") }}';
                        }
                    });
                }
            }

        </script>
    </x-slot>
</x-app-layout>
