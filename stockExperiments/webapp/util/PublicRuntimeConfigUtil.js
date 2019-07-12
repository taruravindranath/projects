import getConfig from 'next/config';

const { publicRuntimeConfig } = getConfig();

class PublicRuntimeConfigUtil {
  static getBaseUrl() {
    const { BASE_URL } = publicRuntimeConfig;
    return BASE_URL;
  }
}

export default PublicRuntimeConfigUtil;
