---
extends: _layouts.docs
title: GFM Kitchen Sink
description: Testing the new League CommonMark features
order: 1
---

# GFM Kitchen Sink

This page demonstrates the extra features now available on your site.

## Tables

GFM tables are now fully supported. Your CSS will handle the styling of these standard HTML tables.

| Feature          | Status      | Description                           |
| :--------------- | :---------: | :------------------------------------ |
| Strikethrough    | ✅ Done    | `~~text~~` works perfectly            |
| Tables           | ✅ Done    | Alignment and headers are supported   |
| Task Lists       | ✅ Done    | Great for documentation checklists    |
| Autolinks        | ✅ Done    | www.google.com is now a link          |



## Task Lists

You can now create interactive-style checklists directly in your documentation.

- [x] Switch to League CommonMark
- [x] Enable GFM Extension
- [x] Configure Heading Permalinks
- [ ] Write more documentation

## Strikethrough

You can now show deleted or outdated information using double tildes: 
~~The old Parsedown engine was here.~~ Now we use CommonMark.

## Autolinks

The parser now automatically recognizes URLs without needing the `< >` brackets:
Contact us at https://example.com or visit our forum at forum.example.com.

## Footnotes

GFM allows for easy referencing.
Here's a simple footnote[^1].

[^1]: This is the text for the footnote at the bottom of the page.

## Heading Offsets (Test)

### Sub-heading for Scroll Margin
Clicking a link to this heading in the "On this page" section should land you exactly here, with enough space above for your sticky header.



## Blade Component Integration

Remember to keep blank lines around your components to ensure the parser doesn't mangle the Blade directives!

<x-alert type="success">

**Success!** The GFM extensions are working alongside your custom Blade components.

</x-alert>

<x-code lang="php">

```php
// Your Blade components still work perfectly
public function isWorking()
{
    return true;
}
```
</x-code>

-----

### How to test this:

1.  **Create a new file**: Save the content above as `source/_style_guide/kitchen-sink-gfm.md`.
2.  **Build**: Run `npm run build`.
3.  **Check the TOC**: Verify that "Tables", "Task Lists", and "Footnotes" appear in your "On this page" sidebar and jump to the correct spot.
4.  **Check the visuals**: Ensure the Table has borders and the Task List items have checkboxes (Tailwind usually strips these, so you may need to add `@apply list-disc` or similar to your `.prose ul` if they look like plain dots).

**Would you like me to provide a quick CSS snippet to make those Task List checkboxes look better in Tailwind?**