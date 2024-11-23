<form wire:submit.prevent="create">
    <div class="grid gap-4 mb-4">
        <div>
            <x-forms.label for="title">Title</x-forms.label>
            <x-forms.text-input wire:model="title" name="name" id="name" placeholder="Type post title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        <div>
            <x-forms.label for="body">Body</x-forms.label>
            <x-forms.textarea wire:model="body" name="name" id="name" rows="4"
                placeholder="Type post body" />
            <x-input-error :messages="$errors->get('body')" class="mt-2" />
        </div>
    </div>
    <x-forms.button type="submit" variant="primary">Submit</x-forms.button>
</form>
