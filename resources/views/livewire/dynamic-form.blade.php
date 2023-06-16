<div class="none">
    <button wire:click="addModule">Добави модул</button>
        @foreach ($rows as $index => $row)
            <div wire:key="row-{{ $index }}">
                <input type="text" id="module_title" name="module_title[]" placeholder="Заглавие на модула" required><br>
                <textarea id="module_description" name="module_description[]" placeholder="Описание" required></textarea><br>
                <button wire:click="deleteRow({{ $index }})">Изтрий</button>
            </div>
        @endforeach
    </div>
