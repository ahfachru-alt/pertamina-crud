<div class="inline-flex items-center gap-2" x-data="{ apply(theme){ document.documentElement.classList.remove('light','dark'); if(theme==='light'){document.documentElement.classList.add('light')} if(theme==='dark'){document.documentElement.classList.add('dark')} }" x-on:theme-updated.window="apply($event.detail.theme)" x-init="apply('{{ $theme }}')">
    <button type="button" wire:click="setTheme('light')" class="px-2 py-1 rounded {{ $theme==='light' ? 'bg-gray-200 dark:bg-gray-700' : '' }}">Light</button>
    <button type="button" wire:click="setTheme('dark')" class="px-2 py-1 rounded {{ $theme==='dark' ? 'bg-gray-200 dark:bg-gray-700' : '' }}">Dark</button>
    <button type="button" wire:click="setTheme('system')" class="px-2 py-1 rounded {{ $theme==='system' ? 'bg-gray-200 dark:bg-gray-700' : '' }}">System</button>
</div>

