<?php

declare(strict_types=1);

/*
 * This file is part of the Nelmio SecurityBundle.
 *
 * (c) Nelmio <hello@nelm.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nelmio\SecurityBundle\ContentSecurityPolicy\Violation\Filter;

use Nelmio\SecurityBundle\ContentSecurityPolicy\Violation\Report;
use Symfony\Component\HttpFoundation\Request;

final class DomainsNoiseDetector implements NoiseDetectorInterface
{
    public function match(Report $report, Request $request): bool
    {
        static $domains = [
            '%3c' => true,
            '1087072589.rsc.cdn77.org' => true,
            '11com.site' => true,
            '1179115946.rsc.cdn77.org' => true,
            '1487482361.rsc.cdn77.org' => true,
            '28n2gl3wfyb0.ru' => true,
            '365bihu.meimotuan.com' => true,
            '43fb82b124f14cc79be3595f27d571db.com' => true,
            '51a07e9c51b04a8fbd099125be8bb228.com' => true,
            'a.cloudiiv.com' => true,
            'a.konflab.com' => true,
            'a.linkluster.com' => true,
            'a.slack-edge.com' => true,
            'a.snowplanes.com' => true,
            'a.tfxiq.com' => true,
            'a.turbodsp.com' => true,
            'about' => true,
            'accounts.google.com' => true,
            'adblockers.opera-mini.net' => true,
            'addbin.men' => true,
            'addfirst.men' => true,
            'addtoadd.men' => true,
            'adnotbad.com' => true,
            'ads-mixa.pro' => true,
            'adsstrike.pro' => true,
            'airplus.cloudbasket.dev' => true,
            'air-proxy-1-wcg.corp.capgemini.com' => true,
            'air-proxy-3-wcg.corp.capgemini.com' => true,
            'alldebrid.fr' => true,
            'amiok.org' => true,
            'annuaire.ssi.mi' => true,
            'apelsinnik.website' => true,
            'app.abtasty.com' => true,
            'api.couponmate.com' => true,
            'api.enterdigital.info' => true,
            'api.longurl.org' => true,
            'api.myfindright.com' => true,
            'api.reckonstat.info' => true,
            'api.reftagger.com' => true,
            'api.solutionreal.com' => true,
            'api.theswiftrecord.com' => true,
            'api2.adsrun.net' => true,
            'api3.adsrun.net' => true,
            'api4.adsrun.net' => true,
            'app.bestpriceninja.com' => true,
            'app.sharpspring.com' => true,
            'app.trackduck.com' => true,
            'app_static.haithietchu.com' => true,
            'apps-analytics.net' => true,
            'apps.2gis.ru' => true,
            'aras-bcprox1' => true,
            'ares.q-one-hosting.com' => true,
            'artibe.ru' => true,
            'ashishmishra.in' => true,
            'asrv-a.akamoihd.net' => true,
            'asset' => true,
            'at.alicdn.com' => true,
            'audiocdn.lingualeo.com' => true,
            'awaybird.ru' => true,
            'b.addtoadd.men' => true,
            'b.adsstrike.pro' => true,
            'b.partner-net.men' => true,
            'b.partner-print.men' => true,
            'ballloon.com' => true,
            'bid.exc-ads.com' => true,
            'block.opendns.com' => true,
            'braip.com.br' => true,
            'buffer.com' => true,
            'builtwith.com' => true,
            'camo.githubusercontent.com' => true,
            'cdn.4d4you.com' => true,
            'cdn.adonads.com' => true,
            'cdn.adsnative.com' => true,
            'cdn.ext335.com' => true,
            'cdn.gingersoftware.com' => true,
            'cdn.mash-pot.com' => true,
            'cdn.mathjax.org' => true,
            'cdn.mecash.ru' => true,
            'cdn.tutsplus.com' => true,
            'cdn.viglink.com' => true,
            'cdn3.org' => true,
            'cdncash.com' => true,
            'cdncash.net' => true,
            'cdncash.org' => true,
            'cf.vsavr.com' => true,
            'chat.rphaven.com' => true,
            'chinagamingnews.com' => true,
            'ci.doubleclickadexchange.net' => true,
            'cjs.linkbolic.com' => true,
            'cl4appf.com' => true,
            'cn.bing.com' => true,
            'code.abtasty.com' => true,
            'cofffre.com' => true,
            'com.lge.browser' => true,
            'commondatastorage.googleapis.com' => true,
            'connect.facebook.net' => true,
            'connectionstrenth.com' => true,
            'console.teamgum.com' => true,
            'contentcdn.lingualeo.com' => true,
            'coolbar.pro' => true,
            'counter.yadro.ru' => true,
            'cpmrockz.com' => true,
            'cr-input.mxpnl.net' => true,
            'css.zohostatic.com' => true,
            'd144fqpiyasmrr.cloudfront.net' => true,
            'd19tqk5t6qcjac.cloudfront.net' => true,
            'd1ks1friyst4m3.cloudfront.net' => true,
            'd1ui18tz1fx59z.cloudfront.net' => true,
            'd21r4q0rdzodf.cloudfront.net' => true,
            'd22p2jhoymd2lo.cloudfront.net' => true,
            'd25k7p3x8sdssj.cloudfront.net' => true,
            'd2a8a4q9.ssl.hwcdn.net' => true,
            'd2asqqdjv2zbgw.cloudfront.net' => true,
            'd2x1jgnvxlnz25.cloudfront.net' => true,
            'd389zggrogs7qo.cloudfront.net' => true,
            'd3b3ehuo35wzeh.cloudfront.net' => true,
            'd3ijcis4e2ziok.cloudfront.net' => true,
            'dasertyupor.com' => true,
            'dash' => true,
            'data1.itineraire.info' => true,
            'dataloading.net' => true,
            'delicious.com' => true,
            'dersens04.mgsops.net' => true,
            'developer.android.com' => true,
            'dl.metabar.ru' => true,
            'dobrofiles.ru' => true,
            'dotepub.com' => true,
            'easyid.scansafe.net' => true,
            'ecosmartfilter.com' => true,
            'emakinafr.okta.com' => true,
            'en.wikipedia.org' => true,
            'englishgamer.com' => true,
            'everads.men' => true,
            'extads.net' => true,
            'extlabs.io' => true,
            'extstat.com' => true,
            'fabsgame.com' => true,
            'fanyi.baidu.com' => true,
            'fast-searcher-sng-v4.com' => true,
            'fast-searcher-ww-v3.com' => true,
            'ff-input.mxpnl.net' => true,
            'filtering.cabulldogs.org' => true,
            'fp125.mediaoptout.com' => true,
            'freewebview.com' => true,
            'front.meimotuan.com' => true,
            'gamerzcrack.com' => true,
            'gamesofgrandeur.com' => true,
            'gamescaledemo.com' => true,
            'gamespotato.com' => true,
            'gamingdude.com' => true,
            'gateway.zscaler.net' => true,
            'gateway.zscalertwo.net' => true,
            'ge0ip.com' => true,
            'ge0ip.net' => true,
            'getpingu.com' => true,
            'getpocket.com' => true,
            'github.com' => true,
            'gln.doneticket.net' => true,
            'gocoupons.ru' => true,
            'godoc.org' => true,
            'goj.drivemac.net' => true,
            'golang.org' => true,
            'goodbits.io' => true,
            'goodblock.gladly.io' => true,
            'googledrive.com' => true,
            'gs1.wac.edgecastcdn.net' => true,
            'hades.srvtrck.com' => true,
            'hm.baidu.com' => true,
            'huaban.com' => true,
            'i.kinja-img.com' => true,
            'i.srvtrck.com' => true,
            'i0.wp.com/' => true,
            'icontent.us' => true,
            'idtono.ru' => true,
            'igithab.com' => true,
            'iiz8go5l.ru' => true,
            'immersiongamer.com' => true,
            'in.adloads.net' => true,
            'in.adsloads.com' => true,
            'inject.kengz.com' => true,
            'inst.search-with.us' => true,
            'inst.shoppingate.info' => true,
            'interyield.jmp9.com' => true,
            'inxcdn.com' => true,
            'ipy.sheetinglulu.com' => true,
            'istatic.eshopcomp.com' => true,
            'jquerylib.net' => true,
            'jsfuel.com' => true,
            'jsl.infostatsvc.com' => true,
            'kejnojd7.ru' => true,
            'klenty-io-2622.herokuapp.com' => true,
            'knpbundles.com' => true,
            'kraykatgames.com' => true,
            'lab.maltewassermann.com' => true,
            'labs.microsofttranslator.com' => true,
            'lancheck.net' => true,
            'lantrededragor.online.fr' => true,
            'lb.apicit.net' => true,
            'lecture-en-ligne.com' => true,
            'linksads.pro' => true,
            'likecoupon.ru' => true,
            'localhost' => true,
            'lonbfbvmiis2.timeinc.com' => true,
            'm44.prod2016.com' => true,
            'm51.prod2016.com' => true,
            'm53.prod2016.com' => true,
            'magicplayer-s.acestream.net' => true,
            'mc.yandex.ru' => true,
            'me.captnemo.in' => true,
            'media.tenor.co' => true,
            'media-dmg.assets-cdk.com' => true,
            'mediaddons.com' => true,
            'metrext.com' => true,
            'ms-browser-extension' => true,
            'mstat.acestream.net' => true,
            'music.baidu.com' => true,
            'mybrowserpages.com' => true,
            'myfavlink.sinaapp.com' => true,
            'net.ootil.fr' => true,
            'newsfeedgame.com' => true,
            'nikkomsgchannel' => true,
            'niroo.info' => true,
            'nps.noproblemppc.com' => true,
            'nytimes.github.io' => true,
            'o.yieldsquare.com' => true,
            'ofenop.ru' => true,
            'onlinegametech.com' => true,
            'onlinemegax.com' => true,
            'onlineshopping.flysas.com' => true,
            'p.cpx.to' => true,
            'p1.answerdash.com' => true,
            'p9rilxagra8kv.ru' => true,
            'partner-net.men' => true,
            'partner-print.men' => true,
            'partners-ship.pro' => true,
            'php.net' => true,
            'pipes.yahoo.com' => true,
            'pizdopletka.club' => true,
            'pk.adloads.net' => true,
            'proxy.tldr.io' => true,
            'proxyfr09.corp.thales/' => true,
            'proxyfr10.corp.thales/' => true,
            'pstatic.bestpriceninja.com' => true,
            'pstatic.davebestdeals.com' => true,
            'query.yahooapis.com' => true,
            'r1---sn-huoj5hxgvvo-qa5e.googlevideo.com' => true,
            'ratexchange.net' => true,
            'rawgit.com' => true,
            'readitlaterlist.com' => true,
            'realpython.com' => true,
            'reek.github.io' => true,
            'reg.ctxserv.com' => true,
            'reminderbear-hr.appspot.com' => true,
            'rescn.u3.ucweb.com' => true,
            'rrr7.site' => true,
            'rules.foxydeal.com' => true,
            'rules.similardeals.net' => true,
            's.aolcdn.com' => true,
            's.terasgames.com' => true,
            's.ytimg.com' => true,
            's11.cnzz.com' => true,
            's3-us-west-1.amazonaws.com' => true,
            's3.amazonaws.com' => true,
            's3.eu-central-1.amazonaws.com' => true,
            's3.feedly.com' => true,
            'sandboxgamer.com' => true,
            'scontent.xx.fbcdn.net' => true,
            'search-goo.com' => true,
            'secure.adnxs.com' => true,
            'secure.audienceinsights.net' => true,
            'secure.easyshoppermac.com' => true,
            'secure.hotshoppymac.com' => true,
            'secure.liveshoppersmac.com' => true,
            'secure.myshopmatemac.com' => true,
            'secure.nozbe.com' => true,
            'secure.surfbuyermac.com' => true,
            'seemright.xyz' => true,
            'server.connecto.io' => true,
            'serverads.net' => true,
            'skytraf.xyz' => true,
            'sinaweibo' => true,
            'sitegainer.com' => true,
            'siteheart.net' => true,
            'slivnewnew.ru' => true,
            'slivstartshlak.ru' => true,
            'snippet.intenta.io' => true,
            'soundfrost.org' => true,
            'spaceshipad.com' => true,
            'sprymedia.co.uk' => true,
            'srdrvp.com' => true,
            'static.cardekho.com' => true,
            'static.dcoengine.com' => true,
            'static.donation-tools.org' => true,
            'static.weibopay.com' => true,
            'stats.g.doubleclick.net' => true,
            'status-api.tym.cool' => true,
            'sweetygames.com' => true,
            'tags.bkrtx.com' => true,
            'tags.clickintext.net' => true,
            'takethatad.com' => true,
            'teamgum.s3.amazonaws.com' => true,
            'th.adloads.net' => true,
            'threatennomore.xyz' => true,
            'toolbar.avg.com' => true,
            'traffmasta.pw' => true,
            'translate.google.com' => true,
            'translate.googleapis.com' => true,
            'trendtext.eu' => true,
            'tts.baidu.com' => true,
            'tvid.xyz' => true,
            'ubnsyhv27fa2j.ru' => true,
            'uc.gre' => true,
            'ukrskidki.su' => true,
            'umekana.ru' => true,
            'ups-app.com' => true,
            'usage.trackjs.com' => true,
            'userdmp.com' => true,
            'utop.it' => true,
            'v24s.net' => true,
            'videogamerosters.com' => true,
            'walkme.timeinc.com' => true,
            'webfeperf.appspot.com' => true,
            'weixin' => true,
            'weixinping' => true,
            'ws.blackpills.com' => true,
            'www.127.0.0.1' => true,
            'www.adstomat.ru' => true,
            'www.baidu.com' => true,
            'www.betadeli.com' => true,
            'www.devcf.com' => true,
            'www.diki.pl' => true,
            'www.facebook.com' => true,
            'www.findizer.fr' => true,
            'www.googletagmanager.com' => true,
            'www.instapaper.com' => true,
            'www.macleans.ca' => true,
            'www.mediaplusweb.com' => true,
            'www.moedict.tw' => true,
            'www.multitran.ru' => true,
            'www.my-app-analytics.com' => true,
            'www.parsely.com' => true,
            'www.quanduoduo.com' => true,
            'www.qwtbx.com' => true,
            'www.rphaven.com' => true,
            'www.seats2meet.com' => true,
            'www.spendesk.com' => true,
            'www.superfish.com' => true,
            'www.tailwindapp.com' => true,
            'www.wikiwand.com' => true,
            'www.window-promo.com' => true,
            'www.youradexchange.com' => true,
            'xa.xingcloud.com' => true,
            'xco.versussulphide.com' => true,
            'yourads.website' => true,
            'yzutbfns.com' => true,
            'yzy.admanaerofoil.com' => true,
            'zeromov.com' => true,
            'zillow.okta.com' => true,
        ];

        $domain = $report->getDomain();

        if (null === $domain) {
            return false;
        }

        return \array_key_exists($domain, $domains);
    }
}
