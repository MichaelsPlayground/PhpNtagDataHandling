# Storage Management concept

This is a raw concept to describe the several phases for a Storage Management. This should be used to manage all goods stored in 
a depot or depot room. Inmost cases the goods are stored in cardboards; they can get stapled in the room. During "filling" phase 
you probably know what is inside the cardboards but in some months or years the memory will fade. To get an easy access to your 
stored items this app will help you in easy finding the goods by identifying the cardboard's.

Before moving on let's define some terminology:

## Terminology

- Depot room: in most cases you will rent one or more storage room(s), the naming will be **depot room**
- Cardboard number: Most the goods will be stored within cardboards but some (large or cumbersome) will be stored solely but 
all (cardboards and signle objects) will get a unique number: **storage unit**
- Owner: sometimes there is more than one owner of the goods: **owner number**
- Weight: depending on the goods in the cardboard they can get very heavy and you should provide a simple **heavy index**: 
(1 = lightweight, 2 = medium and 3 = hevy weight)

## Components used for the management

The concept uses 4 components that work together:

- **NFC-Sticker**: the work is based on NFC tags of type NTAG21x, preferable NTAG213 as they are the cheapest ones. I'm using 
stickers that get sticked on the surface of any storage goods. You can use up to 3 sticker for the same storage unit
- **Android smartphone**: As the chosen tags are using the **NfcA** technology they are read- and writable with every smartphone
  (device) that has NFC capabilities. The device is used to personalize and registration of the tags to the backend service, 
making and transfering photos of storage unit's content and assignment of the tag's UID to the storage unit number.
- **Backend service**: this service is running of a regular webserver with PHP support (an Apache server is the preferred one). 
It will store the tag data, images and content informations.
- **user's personal computer**: as a personal computer (PC) usually has a keyboard and mouse support this is more suitable to work with 
content data like lists. The PC is used to fill the content information e.g. with copy/pasting from already available lists.

## Lifetime phases of the project

We encounter several phases in the lifetime of the storing project that are described in detail:

### Tag personalization phase

For an easy usage the NFC tags need to get setup that they provide tag's **Unique Identifier** ("UID") encapsulated in a NDEF message 
that comes as an URL (link) type. The personalization of a tag can be done in advance because in this phase the tag is not coupled 
to a storage unit. As the chosen NFC tags provide a password based memory locking this should be considered to avoid any (wanted or not)
reprogramming of the tags.

### Tag registration phase

This step can be done in advance as well and should be done in an environment where a good WIFI support is given. Just tap each tag to 
the reader device (the smartphone), let the tag get connected to the backend server that receives the UID that is embedded as part of the 
URL. The backend server register the tag in his database. At this point the tag is not coupled to a storage unit.

### Storage unit registration phase

This is done when filling the cardboard's with goods - scan the sticked NFC tag, provide a unique storing unit number (tip: you should 
additionally write this number to cardboard's sides as well) and make some photos of the content. This is an offline process without any 
internet connection needed to work. As this time the NFC tag gets coupled to the storing unit number.

PS: Don't forget to register all stuck tags (when using multiple tags on a cardboard only the first tag should get the full information, 
additional tags just need the storage unit number).

### Data upload phase

Especially when working with images during the first filling of a storage room there a some megabyte of data that needs to get transferred 
to the backend server. For that reason the previous phase was an offline phase but now we need a (fast) internet connection to send all 
of the data to the backend server. When making the photos you need to assign them to a storage unit number 





