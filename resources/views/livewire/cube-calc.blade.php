<div class="lg:w-full lg:p-1">
		<div class="title">
			 <div class="p-2 m-3 lg:text-lg text-md">Вычислитель кубометра </div>
		</div>

		<!--Type chooser-->
		<div class="bg-gray-200 rounded-lg">
			<div class="flex flex-col items-center justify-center">
					<div class="flex flex-col">
							<label class="inline-flex items-center mt-3">
									<input type="radio" wire:model="shape" id="circular" name="shape" value="circular" class="form-radio h-5 w-5 text-blue-600" checked><span class=" p-1 rounded text-gray-700">Кругляк</span>
							</label>
							<label class="inline-flex items-center mt-3">
									<input  type="radio" wire:model="shape" id="plane" value="plane" name="shape" placeholder="тип дерева" class="form-radio h-5 w-5 text-red-600"><span class=" p-1 rounded text-gray-700">Доска</span>
							</label>
					</div>
			</div>
      <div class="flex lg:flex-col flex-wrap items-center lg:justify-center block ">
					<label>
					<span class="flex justify-left">Количество  @if ($shape === 'plane') досок @elseif ($shape === 'circular') кругляков  @endif </span>
					<div class="flex lg:flex-row reset" id="count" name="count"> 
					@foreach (['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'] as $cnt)
							<label class="lg:inline-flex items-center mt-3">
									<input type="radio" wire:model="count" id="count" name="count" value="{{$cnt}}" class="form-radio h-5 w-5 text-blue-600" checked><span class=" p-1 rounded text-gray-700">{{ $cnt }}</span>
							</label>
					@endforeach
					</div>
					</label>
			</div>
		</div>

		<!--Text inputs-->
		<div class="mt-2  flex lg:flex-center flex-wrap items-center lg:justify-center justify">
			<label >
				<span class="flex justify-left">Длина</span>
				<input type="text" wire:model="length" alt="длина" placeholder="в метрах" class="rounded block  m-2 "  name="length" id="length">
			</label>
			
			<label >
			<span class="flex justify-left">Ширина / диаметр</span>
			<input type="text" wire:model="smWidthInMm" alt="ширина / диаметр в миллиметрах" placeholder= "в миллиметрах" class="rounded  block  m-2" name="width" id="width">  
			</label>
			<label>
			@if ($shape === 'plane')
				<span class="flex justify-left">Толщина в миллиметрах</span>
				<input type="text" wire:model="thickness" alt="толщина доски" placeholder="толщина доски в мм" class="rounded  block m-2"> 
			@endif
			</label>
		</div>

		<!--Launch button-->
		<div class="p-2 bg-gray-200 rounded mt-2">
			@if ($shape === 'circular') 
				<button wire:click="calculateCubes()">
					Посчитать кубы для кругляка
				</button>
			@endif
			@if ($shape === 'plane') 
				<button wire:click="calculateCubes()">
					Посчитать кубы для доски
				</button>
			@endif
		</div>

		<!--Calc answer-->
		<div class="rounded p-2 ">
			<p >Объём 
				{{ $count }}
				@if ($shape === 'plane')  досок  @elseif ($shape === 'circular') кругляков @else изделий @endif
					 длиной {{ $length }} метров и
				@if ($shape === 'plane') меньшей шириной @elseif ($shape === 'circular') меньшим диаметром @endif {{  $smWidthInMm }} миллиметров         
			</p>
			<p>
				@if ($shape === 'plane') а также толщиной {{ $thickness }} миллиметров @endif
			</p>
			<p class="p-2 mt-1">
					составляет <div class="text-2xl font-bold" >{{ $volumeInCubicMeters }}</div> кубометров.
			</p>
		</div>
</div>
