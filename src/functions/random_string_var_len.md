# random_string_var_len

Returns a variable random string made from ascii printing characters.

## Description
```
random_string_var_len(Int $length = 10) : String
```

Returns a random string with a varying length between 1 and $length.

## Parameters

**length**
An integer value specifying the maximum length of the string.

## Return Values

Returns a string.

## Example

**Example 1**

```
echo random_string_var_len(5);
```
The above example will output:
```
ssdw
```
