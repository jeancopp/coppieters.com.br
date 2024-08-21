import React from 'react';
import ReactDOM from 'react-dom/client';
import App from '@pages/App.jsx';
import 'bootstrap/dist/css/bootstrap.min.css';


ReactDOM.createRoot(document.querySelector('#root')).render(
  <React.StrictMode>
    <App />
  </React.StrictMode>,
)
