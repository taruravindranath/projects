import React from 'react';
import Document, { Head, Main, NextScript } from 'next/document';
import { version } from '../package.json';

import PublicRuntimeConfigUtil from '../util/PublicRuntimeConfigUtil';

export default class MyDocument extends Document {
  constructor(props) {
    super(props);
  }

  render() {
    return (
      <html lang="en">
      <Head>
        <meta name="version" content={version} />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href={`/css/style.css?v=${version}`} />
      </Head>
      <body>
      <Main />
      <NextScript />
      </body>
      </html>
    );
  }
}
