# What is i18n and why do we use it?
According to the **i18n documentation**:
https://www.i18next.com/overview/introduction

i18next is an **internationalization-framework** written in and for JavaScript. But it’s much more than that!
RU: i18next - это фреймворк для интернационализации, написанный на JavaScript. Но это гораздо больше, чем просто фреймворк!

i18next goes beyond just providing the standard i18n features such as (plurals, context, interpolation, format). It provides you with a complete solution to localize your product from web to mobile and desktop.
RU: i18next выходит за рамки обычных функций i18n, таких как (множественные числа, контекст, интерполяция, форматирование). Он предоставляет вам полное решение для локализации вашего продукта от веба до мобильных и настольных приложений.

# How to use i18n in your React App ?
In this section, I’m gonna teach you how to use i18n in your React App. So, let’s do it.


## Step 1: Install react-i18next and i18next
At the point, we need to install all the required dependecies from i18n, or if you want to call i18next. For that, we just need to run that command in our Terminal
- RU: В данный момент нам нужно установить все необходимые зависимости от i18n, или если вы хотите назвать i18next. Для этого нам просто нужно запустить эту команду в нашем терминале

```bash
// NPM
npm install react-i18next i18next --save
---------------------------------------------------
// YARN
yarn add react-18next i18next
```
After that, we have all the dependencies correctly.

## Step 2: Create the i18n file for all the configurations
In this step, we need to create the i18n file. So, just create inside of src folder a file called i18n.js or i18n.ts if you are using typescript.
Inside of that file, we are gonna add the following lines of code:
- RU: В этом шаге нам нужно создать файл i18n. Так что просто создайте внутри папки src файл с именем i18n.js или i18n.ts, если вы используете typescript. Внутри этого файла мы добавим следующие строки кода:

```javascript
import i18n from "i18next";
import { useTranslation, initReactI18next } from "react-i18next";
i18n.use(initReactI18next).init({
    resources: {}, // Where we're gonna put translations' files
    lng: "en",     // Set the initial language of the App
    fallbackLng: "en", // If the language detector fails, it will use this language
});
```

## Step 3: Create JSON File for each language of your App
At the moment, we need to create a JSON File for each language that we’re gonna have in our App, like:
If our app is gonna have Portuguese and English as languages, we need to create en.json and ru.json.
You need to create a folder called “locale” inside of src folder, and then create the languages files JSON.
- RU: В данный момент нам нужно создать JSON-файл для каждого языка, который будет в нашем приложении, например: Если наше приложение будет иметь португальский и английский языки, нам нужно создать en.json и ru.json. Вам нужно создать папку с именем «locale» внутри папки src, а затем создать файлы языков JSON.


The JSON Files should have the following specific structure:
- RU: JSON-файлы должны иметь следующую специфическую структуру:

```json
// en.json
{
  "translation": {
    "specificKey": "Translated Value"
  }
}
// ru.json
{
  "translation": {
    "specificKey": "Переведенное Значение"
  }
}
```
As you can see, the magic is gonna happen inside translations property. If you have a header title in your app, and you want to translate your header title depends on which language is selected, you need to have the JSON Files equals to that:
- RU: Как видите, волшебство будет происходить внутри свойства перевода. Если у вас есть заголовок заголовка в вашем приложении, и вы хотите перевести заголовок заголовка в зависимости от выбранного языка, вам нужно иметь JSON-файлы, равные этому:


```json
// en.json
{
  "translation": {
    "heading": "Hello {{name}}, welcome to {{appName}}"
  }
}
// ru.json
{
  "translation": {
    "heading": "Привет {{name}}, добро пожаловать в {{appName}}"
  }
}
```
The i18n works like that, we pass to it a specific key and it check which language is selected and then return the value of that specific key. But if you have {{someKey}} inside the value of a specific key, you can pass a certain text that is not gonna translate if you change the language.
- RU: i18n работает так, мы передаем ему определенный ключ, и он проверяет, какой язык выбран, а затем возвращает значение этого конкретного ключа. Но если у вас есть {{someKey}} в значении определенного ключа, вы можете передать определенный текст, который не будет переводиться, если вы измените язык.



## Step 4: Put JSON Files content on Resources property in our Configuration File
Right now, we need to add our JSON Files Content on Resources Property. So, your i18n.js file should be like that at the point:

- RU: В данный момент нам нужно добавить содержимое наших файлов JSON в свойство Resources. Так что ваш файл i18n.js должен быть таким:

```javascript
import i18n from "i18next";
import { useTranslation, initReactI18next } from "react-i18next";
import enJSON from './locale/en.json'
import ruJSON from './locale/ru.json'
i18n.use(initReactI18next).init({
  resources: {
    en: { ...enJSON },
    ru: { ...ruJSON },
  },
  lng: "en",
  fallbackLng: "en",
});
export default i18n;
```
## Step 5: Import our Configurations File in our main JS or TS file of our APP
So, your main JS or TS file of our React App should be like that:
- RU: Так что ваш основной файл JS или TS нашего приложения React должен быть таким:


```javascript

// index.js
// ========================================
import React from "react";
import ReactDOM from "react-dom/client";
import App from "./App";
import { I18nextProvider } from 'react-i18next';
import i18n from './i18n';

  <React.StrictMode>
    <I18nextProvider i18n={i18n}>
      <App />
    </I18nextProvider>
  </React.StrictMode>
```


## Step 6: We need to use use that in our React Component
So, our App.tsx or App.jsx should be like that for we test if i18n is working correctly:

- RU: Так что наш App.tsx или App.jsx должен быть таким, чтобы мы проверили, работает ли i18n правильно:

```javascript
// App.js

import { useState } from "react";
import { useTranslation } from "react-i18next";
function App() {
    const { t, i18n: {changeLanguage, language} } = useTranslation();
    const [currentLanguage, setCurrentLanguage] = useState(language)
    const handleChangeLanguage = () => {
        const newLanguage = currentLanguage === "en" ? "ru" : "en";
        setCurrentLanguage(newLanguage);
        changeLanguage(newLanguage);
    }
    return (
        <div className="App">
            <h1>
                Our Translated Heading: 
                {t('heading', { name: "Alisher", appName: "App for Translations" })}
            </h1>
            <h3>
                Current Language: {currentLanguage}
            </h3>
            <button 
                type="button" 
                onClick={handleChangeLanguage}
            >
                Change Language
            </button>
        </div>
    );
}
export default App;
```

### Or if you are using useContext
```javascript
import AllComponents from "./components/AllComponents"
import { BrowserRouter } from "react-router-dom";
import { useTranslation } from "react-i18next";
import { useContext } from "react";
import { globalContext } from "./state";

function App() {
  const { t, i18n: { changeLanguage, language } } = useTranslation();
  const state = useContext(globalContext)

  const handleChangeLanguage = () => {
    const newLanguage = language === "en" ? "ru" : "en";
    state.dispatch({ type: "CHANGE_LANG", currentLanguage: newLanguage })
    changeLanguage(newLanguage);
  }

  return (
    <div className="App">
      <h1>
        Our Translated Heading:
        {t('heading', { name: "Alisher", appName: "App for Translations" })}
      </h1>
      <h3>
        Current Language: {language}
      </h3>
      <button className="warning-btn" onClick={handleChangeLanguage}
      >
        Change Language
      </button>
    </div>
  );
}
export default App;
```

So, as you can see the magic happens because we use **useTranslations()** hook. For translate, we use **t()** method inside our HTML section and this method receive a key (the key which we set in our JSON Files) and options object that we can pass the text (the text which we set in our JSON Files as appName) that is not gonna translate if we change the language

- RU: Как видите, волшебство происходит потому, что мы используем хук useTranslations (). Для перевода мы используем метод t () внутри нашего раздела HTML, и этот метод получает ключ (ключ, который мы устанавливаем в наших файлах JSON) и объект параметров, в котором мы можем передать текст (текст, который мы устанавливаем в наших файлах JSON как appName), который не будет переводиться, если мы изменяем язык

# And it is done 🥳🎉🎊
At the moment we are done, and now you can use i18n in your React App
- RU: В данный момент мы закончили, и теперь вы можете использовать i18n в своем приложении React

_________________________________________________
```
Maxmaraimov Ozodbek Shuxratov
```
_________________________________________________