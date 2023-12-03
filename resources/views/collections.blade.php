@extends('shopify-app::layouts.default')
@section('scripts')
	<script type="text/javascript" src="//cdn.tailwindcss.com?plugins=forms,typography"></script>
	<script type="text/javascript">
		function editGroup(button) {
			console.log(button.dataset);
			// document.getElementById('create-group').classList.remove('hidden');
			//get the data-name, data-description and data-id
			document.getElementById('collection_name').value = button.dataset.name;
			document.getElementById('collection_description').value = button.dataset.description;
			document.getElementById('collection_id').value = button.dataset.id;
			document.getElementById('submit-button').innerText = 'update';
		}
	</script>
@endsection

@section('content')
	<div class="items-top gap-x-12 sm:px-4 md:px-0 lg:flex">
		<section class="flex-auto bg-gray-100" id="create-group">
			<div class="p-14">
				<h3 class="mt-12 text-gray-800 text-2xl font-semibold sm:text-2xl">Create Collections</h3>
				<div class="flex-1 mt-10 sm:max-w-lg lg:max-w-md">
					<form method="POST" action="{{ route('collections.save') }}" class="space-y-5">
					@sessionToken
						<input type="hidden" name="host" value="{{getHost()}}">
						<input type="hidden" id="collection_id" name="collection_id" value='0'>
						<div>
							<label class="font-medium" for="collection_name">Name</label><br/>
							<input type="text" name="collection_name" id="collection_name" class="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg" required />
						</div>
						<div>
							<label class="font-medium" for="collection_description">Description</label><br/>
							<textarea name="collection_description" id="collection_description" rows="3" class="w-full mt-2 px-3 py-2 text-gray-500 bg-transparent outline-none border focus:border-indigo-600 shadow-sm rounded-lg"></textarea>
						</div>
						<button id="submit-button" type="submit"
							class="w-full px-4 py-2 text-white font-medium bg-indigo-600 hover:bg-indigo-500 active:bg-indigo-600 rounded-lg duration-150">
							Create Collection
						</button>
					</form>
				</div>
			</div>
		</section>
		
		<section class="flex-auto bg-white">
			<div class="py-14">
				<div class="max-w-screen-xl mx-auto px-4 text-gray-600 md:px-8">
					<div class="mx-auto gap-12">
						<div class="flex justify-between">
							<div class="max-w-lg space-y-3">
								<h3 class="text-indigo-600 font-semibold">Collections</h3>
								<p class="text-gray-800 text-3xl font-semibold sm:text-4xl">
									Available collections
								</p>
								<p>
									Here are your available collections. You can edit or delete them.
								</p>
							</div>
						</div>
					</div>
					<div class="max-w-screen-xl mx-auto px-4 py-4 md:px-8">
						<div class="mt-12 relative h-max overflow-auto">
							<table class="w-full table-auto text-sm text-left">
								<thead class="text-gray-600 font-medium border-b">
									<tr>
										<th class="py-3 pr-6">name</th>
										<th class="py-3 pr-6">date</th>
										<th class="py-3 pr-6">shop id</th>
										<th class="py-3 pr-6"></th>
									</tr>
								</thead>
								<tbody class="text-gray-600 divide-y">
									@foreach ($collections as $collection)
										<tr>
											<td class="pr-6 py-4 whitespace-nowrap ">
												{{ $collection->name }}
											</td>
											<td class="pr-6 py-4 whitespace-nowrap ">
												{{ $collection->description }}
											</td>
											<td class="pr-6 py-4 whitespace-nowrap"><span
													class="px-3 py-2 rounded-full font-semibold text-xs text-green-600 bg-green-50">{{ $collection->shop_id }}</span>
											</td>

											<td class="text-right whitespace-nowrap">
												<button onclick="editGroup(this)"
													class="py-1.5 px-3 text-gray-600 hover:text-gray-500 duration-150 hover:bg-gray-50 border rounded-lg"
													data-id="{{ $collection->id }}" data-name="{{ $collection->name }}"
													data-description="{{ $collection->description }}">Edit</button>
												&nbsp;
												<a href="{{ URL::tokenRoute('products.index', ['collection_id' => $collection->id]) }}"
                                                class="py-1.5 px-3 text-red-600 hover:text-gray-500 duration-150 hover:bg-red-50 border rounded-lg">Products</a>
												
											</td>

										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			</div>
		</section>
	</div>
@endsection

@section('scripts')
    <script>
		// console.log('hello');
        // function hideCreateGroup() {
        //     document.getElementById('create-group').classList.add('hidden');
        //     //clear the values
        //     document.getElementById('name').value = '';
        //     document.getElementById('description').value = '';
        //     document.getElementById('groupid').value = '';
        // }

        // function editGroup(button) {
        //     console.log(button.dataset);
        //     // document.getElementById('create-group').classList.remove('hidden');
        //     //get the data-name, data-description and data-id
        //     document.getElementById('collection_name').value = button.dataset.name;
        //     document.getElementById('collection_description').value = button.dataset.description;
        //     document.getElementById('collection_id').value = button.dataset.id;
        // }
    </script>
@endsection