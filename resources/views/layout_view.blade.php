<!-- resources/views/layout_view.blade.php -->
<x-layout>
    <!-- Heading Slot -->
    <x-slot name="heading">
        View from the layout view
    </x-slot>

    <!-- Content for the Main Section -->
    <p>This is some content inside the layout view. You can add any content here.</p>

    <!-- Pass content to the Sidebar Slot -->
    <x-slot name="sidebar">
        <ul>
            <li><a href="#">Custom Sidebar Item 1</a></li>
            <li><a href="#">Custom Sidebar Item 2</a></li>
            <li><a href="#">Custom Sidebar Item 3</a></li>
        </ul>
    </x-slot>

    <!-- Footer Slot (Optional) -->
    <x-slot name="footer">
        <p>&copy; 2025 Custom Footer Content</p>
    </x-slot>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At culpa veritatis porro commodi dignissimos blanditiis ad quibusdam dolorem quidem minus!</p>
</x-layout>
