# notion-plantuml
Generates PlantUML diagram (PNG) from Notion code block using Notion API and [Kroki](https://kroki.io).

This script needs to be run outside, accessible by Notion and able to access the Notion API. 

In Notion, embed link to the script with the id of the code block in `blockId`. The id of the block can be found by copying its link -> the part after the # sign is the id.

https://path/to/script.php?blockId=123456789 -> PNG image file.
