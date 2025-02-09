<div>
    {{-- Кнопка, открывающая модальное окно --}}
    <button id="add-task-button"
        class="mx-4 mb-6 px-6 py-2 text-white bg-blue-500 font-semibold rounded-lg shadow-md hover:bg-blue-600"
        wire:click="$set('showModal', true)"
    >
        Добавить задачу
    </button>

    {{-- Модальное окно --}}
    @if ($showModal)
        <div
            class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 px-4"
            wire:click="$set('showModal', false)" {{-- Закрытие при клике вне модального окна --}}
        >
            {{-- Контейнер модального окна --}}
            <div
                class="bg-white rounded-lg shadow-lg w-96 p-6 relative"
                wire:click.stop {{-- Останавливаем всплытие клика --}}
            >
                <h2 class="text-xl font-bold text-gray-800 mb-4">Добавить задачу</h2>

                <form wire:submit.prevent="saveTask">
                    {{-- Название задачи --}}
                    <label class="block mb-2 text-sm font-medium text-gray-600">О чем тебе напомнить</label>
                    <textarea
                        rows="6"
                        wire:model="title"
                        class="w-full px-4 py-2 mb-4 bg-gray-200 border rounded-md
                               focus:outline-none focus:ring-2 focus:ring-blue-500"
                    ></textarea>
{{--                    <input--}}
{{--                        type="text"--}}
{{--                        wire:model="title"--}}
{{--                        class="w-full px-4 py-2 mb-4 bg-gray-200 border rounded-md--}}
{{--                               focus:outline-none focus:ring-2 focus:ring-blue-500"--}}
{{--                    >--}}
                    @error('title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    {{-- Описание --}}
{{--                    <label class="block mb-2 text-sm font-medium text-gray-600">Описание</label>--}}
{{--                    <textarea--}}
{{--                        wire:model="description"--}}
{{--                        class="w-full px-4 py-2 mb-4 bg-gray-200 border rounded-md--}}
{{--                               focus:outline-none focus:ring-2 focus:ring-blue-500"--}}
{{--                    ></textarea>--}}
                    @error('description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    {{-- Дата окончания --}}
                    <label class="block mb-2 text-sm font-medium text-gray-600">Дата окончания</label>
                    <div class="flex items-center space-x-4 mb-4" id="datePicker">
                        <input
                            type="date"
                            wire:model="due_date"
                            class="flex-grow px-4 py-2 bg-gray-200 border rounded-md
                                   focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                        <button
                            type="button"
                            wire:click="setToday"
                            class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400
                                   focus:outline-none focus:ring-2 focus:ring-blue-400"
                        >
                            Сегодня
                        </button>
                    </div>
                    @error('due_date')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <div class="flex justify-end space-x-4">
                        <button
                            type="button"
                            class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400
                                   focus:outline-none focus:ring-2 focus:ring-blue-400"
                            wire:click="$set('showModal', false)"
                        >
                            Отмена
                        </button>
                        <button
                            type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-md
                                   hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400"
                        >
                            Сохранить
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
