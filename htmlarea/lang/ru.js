// I18N constants

// LANG: "en", ENCODING: UTF-8 | ISO-8859-1
// Current Author(s): HtmlArea developers, http://InferiorProducts.com
// Original Author: Mihai Bazon, http://dynarch.com/mishoo

// FOR TRANSLATORS:
//
//   1. PLEASE PUT YOUR CONTACT INFO IN THE ABOVE LINE
//      (at least a valid email address)
//
//   2. PLEASE TRY TO USE UTF-8 FOR ENCODING;
//      (if this is not possible, please include a comment
//       that states what encoding is necessary.)

HTMLArea.I18N = {

	// the following should be the filename without .js extension
	// it will be used to automatically load the plugin language.
	lang: "ru",

	tooltips: {
		bold:           "Bold",
		italic:         "Italic",
		underline:      "Underline",
		strikethrough:  "Strikethrough",
		subscript:      "Subscript",
		superscript:    "Superscript",
		justifyleft:    "Justify Left",
		justifycenter:  "Justify Center",
		justifyright:   "Justify Right",
		justifyfull:    "Justify Full",
		orderedlist:    "Ordered List",
		unorderedlist:  "Bulleted List",
		outdent:        "Decrease Indent",
		indent:         "Increase Indent",
		forecolor:      "Font Color",
		hilitecolor:    "Background Color",
		horizontalrule: "Horizontal Rule",
		createlink:     "Insert Web Link",
		insertimage:    "Insert/Modify Image",
		inserttable:    "Insert Table",
		htmlmode:       "Toggle HTML Source",
		popupeditor:    "Enlarge Editor",
		about:          "About this editor",
		showhelp:       "Help using editor",
		textindicator:  "Current style",
		undo:           "Undoes your last action",
		redo:           "Redoes your last action",
		cut:            "Cut selection",
		cut_ff:         "Cut (please use CTRL-X in Mozilla/FireFox)",
		copy:           "Copy selection",
		copy_ff:        "Copy (please use CTRL-C in Mozilla/FireFox)",
		paste:          "Paste from clipboard",
		paste_ff:       "Paste (please use CTRL-V in Mozilla/FireFox)",
		lefttoright:    "Direction left to right",
		righttoleft:    "Direction right to left",
		removeformat:   "Remove formatting",
		print:          "Распечатать",
		killword:       "Clear MSOffice tags"
	},

	buttons: {
		"ok":           "OK",
		"cancel":       "Cancel"
	},

	msg: {
		"Path":         "Путь",
		"TEXT_MODE":    "Вы в текстовом режиме.  Кнопка [<>] для переключения.",

		"IE-sucks-full-screen" :
		// translate here
		"The full screen mode is known to cause problems with Internet Explorer, " +
		"due to browser bugs that we weren't able to workaround.  You might experience garbage " +
		"display, lack of editor functions and/or random browser crashes.  If your system is Windows 9x " +
		"it's very likely that you'll get a 'General Protection Fault' and need to reboot.\n\n" +
		"You have been warned.  Please press OK if you still want to try the full screen editor.",

		"Moz-Clipboard" :
		"Unprivileged scripts cannot access Cut/Copy/Paste programatically " +
		"for security reasons.  Click OK to see a technical note at mozilla.org " +
		"which shows you how to allow a script to access the clipboard.",

		"Link-Text" :
		"You need to select some text before creating a link"
	},

	dialogs: {
		// Common
		"OK"                                                : "OK",
		"Cancel"                                            : "Cancel",

		"Alignment:"                                        : "Alignment:",
		"Not set"                                           : "Not set",
		"Left"                                              : "Left",
		"Right"                                             : "Right",
		"Texttop"                                           : "Texttop",
		"Absmiddle"                                         : "Absmiddle",
		"Baseline"                                          : "Baseline",
		"Absbottom"                                         : "Absbottom",
		"Bottom"                                            : "Bottom",
		"Middle"                                            : "Middle",
		"Top"                                               : "Top",

		"Layout"                                            : "Layout",
		"Spacing"                                           : "Spacing",
		"Horizontal:"                                       : "Horizontal:",
		"Horizontal padding"                                : "Horizontal padding",
		"Vertical:"                                         : "Vertical:",
		"Vertical padding"                                  : "Vertical padding",
		"Border thickness:"                                 : "Border thickness:",
		"Leave empty for no border"                         : "Leave empty for no border",

		// Insert Link
		"Insert/Modify Link"                                : "Insert/Modify Link",
		"None (use implicit)"                               : "None (use implicit)",
		"New window (_blank)"                               : "New window (_blank)",
		"Same frame (_self)"                                : "Same frame (_self)",
		"Top frame (_top)"                                  : "Top frame (_top)",
		"Other"                                             : "Other",
		"Target:"                                           : "Target:",
		"Title (tooltip):"                                  : "Title (tooltip):",
		"URL:"                                              : "URL:",
		"You must enter the URL where this link points to"  : "You must enter the URL where this link points to",
		// Insert Table
		"Insert Table"                                      : "Вставить таблицу",
		"Rows:"                                             : "Строки:",
		"Number of rows"                                    : "Кол-во строк",
		"Cols:"                                             : "Колонки:",
		"Number of columns"                                 : "Кол-во колонок",
		"Width:"                                            : "Ширина:",
		"Width of the table"                                : "Ширина таблицы",
		"Percent"                                           : "Процент",
		"Pixels"                                            : "Пиксел",
		"Em"                                                : "Em",
		"Width unit"                                        : "Ширина",
		"Positioning of this table"                         : "Позиционирование таблицы",
		"Cell spacing:"                                     : "Отступы ячеек:",
		"Space between adjacent cells"                      : "Отступы расширенных ячеек",
		"Cell padding:"                                     : "Отступы ячейки:",
		"Space between content and border in cell"          : "Пробел между содержимым и рамкой",
		// Insert Image
		"Insert Image"                                      : "Вставить картинку",
		"Image URL:"                                        : "URL картинки:",
		"Enter the image URL here"                          : "Введите ссылку картинки",
		"Preview"                                           : "Просмотр",
		"Preview the image in a new window"                 : "Просмотреть в новом окне",
		"Alternate text:"                                   : "Замещающий текс:",
		"For browsers that don't support images"            : "Для браузеров без картинок",
		"Positioning of this image"                         : "Расположение картинки",
		"Image Preview:"                                    : "Предпросмотр:"
	}
};
