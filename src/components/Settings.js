/* eslint no-eval: 0 */

export default {
  // Increase this on every update to reload assets for new on startup
  GAME_VERSION: 9,
  GAME_VERSION_VAR_NAME: 'game_version',
  INDEXEDDB_VERSION: this.GAME_VERSION,
  GAME_UPGRADE_POINT: 'GAME_UPGRADEPOINT',
  GAME_SAVE_POINT: 'GAME_SAVEPOINT',
  // Goto this mark if not found player's one on LOAD button pressing
  DEFAULT_LOAD_MARK_NAME: 'main_menu',
  // Just a name of Index DB for this game
  INDEXEDDB_STORE_NAME: 'store_taxoman',
  // Release = true
  CACHE_ENABLED: false,
  // Google Play IAP
  GP_PRODUCT1_NAME: 'com.skystairgames.taxoman.coin1',
  GP_PRODUCT2_NAME: 'com.skystairgames.taxoman.episodes',
  // You can enable some buttons by default in the regular game
  ENABLE_SAVE_BUTTON: true,
  ENABLE_LOAD_BUTTON: true,
  ENABLE_SKIP_BUTTON: true,
  ENABLE_EPISODES_BUTTON: false,
  ENABLE_BACK_BUTTON: false
}
