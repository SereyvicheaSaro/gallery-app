// src/App.tsx
import React from 'react';
import Gallery from './components/Gallery';
const App: React.FC = () => {
  return (
    <div className="App">
      <center><h1 style={{color: 'black'}}>Gallery App</h1></center>
      <Gallery />
    </div>
  );
};

export default App;
