import React from 'react';
import ReactDOM from 'react-dom';
import { createRoot } from "react-dom/client";
import App from './app';


// ReactDOM.render(<App />,document.getElementById('app'))

    const container = document.getElementById("app");
    if (container) {
        const root = createRoot(container);
        root.render(<App />);
    }
